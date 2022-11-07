<?php

namespace App\Tables;

use App\Models\Componente;
use App\Models\Curso;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;
use Illuminate\Database\Eloquent\Builder;

class ComponentesTable extends AbstractTable
{
    protected Curso $curso;

    public function __construct($id)
    {
        $this->curso = Curso::findOrFail($id);
    }

    protected function table(): Table
    {
        return (new Table())
            ->model(Componente::class)
            ->query(function (Builder $query) {
                $query->select('componentes.*')->where("cursos_id", "=", $this->curso->id);
            })
            ->routes([
                'index'   => ['name' => 'componentes', 'params' => ["id" => $this->curso->id]],
                'create'  => ['name' => 'componente.create', 'params' => ["id" => $this->curso->id]],
                'edit'    => ['name' => 'componente.edit'],
                'destroy' => ['name' => 'componente.destroy'],
            ])
            ->destroyConfirmationHtmlAttributes(fn (Componente $componente) => [
                'data-confirm' => __('<< Não será possível desfazer essa operação! >> Confirma apagar o registro de :entry?', [
                    'entry' => $componente->nome,
                ]),
            ]);
    }

     protected function columns(Table $table): void
    {
        $table->column('id')->title("id");
        $table->column('nome')->title("Nome")->sortable()->searchable();
        $table->column('area')->title("Área")->sortable();
        $table->column('horas')->title("Carga Horária");
        $table->column('regente')->title("Regente")->sortable();
    }

     protected function resultLines(Table $table): void
    {
        //
    }
}
