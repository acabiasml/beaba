<?php

namespace App\Tables;

use App\Models\Calendario;
use App\Models\Bimestre;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;
use Illuminate\Database\Eloquent\Builder;

class BimestresTable extends AbstractTable
{
    protected Calendario $calendario;

    public function __construct($id)
    {
        $this->calendario = Calendario::findOrFail($id);
    }

    protected function table(): Table
    {
        return (new Table())->model(Bimestre::class)
            ->query(function (Builder $query) {
                $query->select('bimestres.*')->where("calendarios_id", "=", $this->calendario->id);
            })
            ->routes([
                'index'   => ['name' => 'bimestres', 'params' => ["id" => $this->calendario->id]],
                'create'  => ['name' => 'bimestre.create', 'params' => ["id" => $this->calendario->id]],
                'edit'    => ['name' => 'bimestre.edit'],
                'destroy' => ['name' => 'bimestre.destroy'],
            ])
            ->destroyConfirmationHtmlAttributes(fn (Bimestre $bimestre) => [
                'data-confirm' => __('<< Não será possível desfazer essa operação! >> Confirma apagar o registro de :entry?', [
                    'entry' => $bimestre->nome,
                ]),
            ]);
    }

    protected function columns(Table $table): void
    {
        $table->column('id')->title("id");
        $table->column('nome')->title("Nome")->sortable(true, 'asc')->searchable();
        $table->column('inicio')->title("Início")->sortable();
        $table->column('fim')->title("Fim")->sortable();
    }

    protected function resultLines(Table $table): void
    {
        //
    }
}
