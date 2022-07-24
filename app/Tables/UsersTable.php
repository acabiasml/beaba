<?php

namespace App\Tables;

use App\Models\User;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Okipa\LaravelTable\Table;
use Illuminate\Support\Facades\Auth;

class UsersTable extends AbstractTable
{
    
    protected Request $request;
    protected int $idescola;

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
            ->destroyConfirmationHtmlAttributes(fn(User $user) => [
                'data-confirm' => __('<< Não será possível desfazer essa operação! >> Confirma apagar o registro de :entry?', [
                    'entry' => $user->nome,
                ]),
            ]);
    }

    /**
     * Configure the table columns.
     *
     * @param \Okipa\LaravelTable\Table $table
     *
     * @throws \ErrorException
     */
    protected function columns(Table $table): void
    {
        $table->column('id')->title("id");
        $table->column('nome')->title("Nome")->sortable(true, 'asc')->searchable();
        $table->column('tipo')->title("Função")->sortable();
        $table->column('telefone1')->title("Telefone");
        $table->column('cpf')->title("CPF");
    }

    /**
     * Configure the table result lines.
     *
     * @param \Okipa\LaravelTable\Table $table
     */
    protected function resultLines(Table $table): void
    {
        //
    }
}
