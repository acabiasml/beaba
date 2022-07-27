<?php

namespace App\Tables;

use App\Models\Calendario;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;
use Illuminate\Database\Eloquent\Builder;

class CalendariosTable extends AbstractTable
{
    protected String $id;

    public function __construct(String $id){
        $this->id = $id;
    }

    protected function table(): Table{
        return (new Table())
            ->model(Calendario::class)
            ->query(function(Builder $query) {
            $query->select('calendarios.*')->where("escolas_id", "=", $this->id);})
            ->routes([
                'index'   => ['name' => 'escolas'],
                'create'  => ['name' => 'calendario.create'],
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
        $table->column('nome')->title("Nome")->sortable()->searchable();
        $table->column('ano')->title("Ano")->sortable(true, 'asc')->searchable();
    }


    protected function resultLines(Table $table): void{
        //
    }
}
