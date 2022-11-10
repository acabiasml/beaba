<?php

namespace App\Tables;

use App\Models\Calendario;
use App\Models\Periodo;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;
use Illuminate\Database\Eloquent\Builder;

class PeriodosTable extends AbstractTable
{
    protected Calendario $calendario;

    public function __construct($id)
    {
        $this->calendario = Calendario::findOrFail($id);
    }

    protected function table(): Table
    {
        return (new Table())->model(Periodo::class)
            ->query(function (Builder $query) {
                $query->select('periodos.*')->where("calendarios_id", "=", $this->calendario->id);
            })
            ->routes([
                'index'   => ['name' => 'periodos', 'params' => ["id" => $this->calendario->id]],
                'create'  => ['name' => 'periodo.create', 'params' => ["id" => $this->calendario->id]],
                'edit'    => ['name' => 'periodo.edit'],
                'destroy' => ['name' => 'periodo.destroy'],
            ])
            ->destroyConfirmationHtmlAttributes(fn (Periodo $periodo) => [
                'data-confirm' => __('<< Não será possível desfazer essa operação! >> Confirma apagar o registro de :entry?', [
                    'entry' => $periodo->nome,
                ]),
            ]);
    }

    protected function columns(Table $table): void
    {
        $table->column('id')->title("id");
        $table->column('nome')->title("Nome")->sortable(true, 'asc')->searchable();
        $table->column('inicio')->title("Início")->sortable()->dateTimeFormat("d-m-Y");
        $table->column('fim')->title("Fim")->sortable()->dateTimeFormat("d-m-Y");
    }

    protected function resultLines(Table $table): void
    {
        //
    }
}
