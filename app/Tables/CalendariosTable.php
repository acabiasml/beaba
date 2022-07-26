<?php

namespace App\Tables;

use App\Models\Calendario;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;
use Illuminate\Http\Request;

class CalendariosTable extends AbstractTable
{
    protected Request $request;

    public function __construct(Request $request){
        $this->request = $request;
    }

    protected function table(): Table{
        return (new Table())->model(Calendario::class)
            ->routes([
                'index'   => ['name' => 'calendarios'],
                'create'  => ['name' => 'calendario.create'],
                'show' => ['name' => 'calendario.show'],
                'edit'    => ['name' => 'calendario.edit'],
                'destroy' => ['name' => 'calendario.destroy'],
            ])
            ->destroyConfirmationHtmlAttributes(fn(Calendario $calendario) => [
                'data-confirm' => __('<< Não será possível desfazer essa operação! >> Confirma apagar o registro de :entry?', [
                    'entry' => $calendario->nome,
                ]),
            ]);
    }

    protected function columns(Table $table): void{
        $table->column('id')->title("id");
        $table->column('nome')->title("Nome")->sortable(true)->searchable();
        $table->column('ano')->title("Ano")->sortable(true, 'asc')->searchable();
    }


    protected function resultLines(Table $table): void{
        //
    }
}
