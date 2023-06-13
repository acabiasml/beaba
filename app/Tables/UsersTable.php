<?php

namespace App\Tables;

use App\Models\User;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Illuminate\Http\Request;
use Okipa\LaravelTable\Table;

class UsersTable extends AbstractTable
{

    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    protected function table(): Table
    {
        return (new Table())->model(User::class)
            ->routes([
                'index'   => ['name' => 'pessoas'],
                'create'  => ['name' => 'user.create'],
                'show' => ['name' => 'user.show'],
                'edit'    => ['name' => 'user.edit'],
                'destroy' => ['name' => 'user.destroy'],
            ])
            ->destroyConfirmationHtmlAttributes(fn (User $user) => [
                'data-confirm' => __('<< Não será possível desfazer essa operação! >> Confirma apagar o registro de :entry?', [
                    'entry' => $user->nome,
                ]),
            ]);
    }

    protected function columns(Table $table): void
    {
        $table->column("id")->title("id");
        $table->column("nome")->title("Nome")->sortable(true, 'asc')->searchable();
        $table->column("tipo")->title("Função")->sortable();
        $table->column("telefone1")->title("Telefone");
        $table->column("cpf")->title("CPF")->searchable();

        $table->column()->title("código")->html(function (User $user) {

            $caminho = route("user.codigo", $user->id);

            if($user->codigo == NULL){
                $string = "<a href='" . $caminho . "'>gerar código</a>";  
            }else{
                $string = $user->codigo;
            }

            if($user->arquivado == NULL or $user->arquivado == 0){
                $string = $string . " 🟢";
            }else{
                $string = $string . " 🟡";
            }

            return $string;
        });
    }

    protected function resultLines(Table $table): void
    {
        //
    }
}
