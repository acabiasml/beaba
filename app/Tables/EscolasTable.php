<?php

namespace App\Tables;

use App\Models\Escola;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;
use Illuminate\Http\Request;

class EscolasTable extends AbstractTable{

    protected Request $request;

    public function __construct(Request $request){
        $this->request = $request;
    }

    protected function table(): Table{
        return (new Table())->model(Escola::class)
            ->routes([
                'index'   => ['name' => 'escolas'],
                'create'  => ['name' => 'escola.create'],
                'show' => ['name' => 'escola.show'],
                'edit'    => ['name' => 'escola.edit'],
                'destroy' => ['name' => 'escola.destroy'],
            ])
            ->destroyConfirmationHtmlAttributes(fn(Escola $escola) => [
                'data-confirm' => __('<< Não será possível desfazer essa operação! >> Confirma apagar o registro de :entry?', [
                    'entry' => $escola->nome,
                ]),
            ]);
    }

    protected function columns(Table $table): void{
        $table->column('id')->title("id");
        $table->column('nome')->title("Nome")->sortable(true, 'asc')->searchable();
        $table->column('cnpj')->title("CNPJ");
        $table->column()->link(route('escolas'));
        $table->column('telefone')->title("Telefone");

        $table->column()->link(route('home'))->title("link");
    }

    protected function resultLines(Table $table): void {
        
    }
}
