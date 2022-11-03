<?php

namespace App\Tables;

use App\Models\Calendario;
use App\Models\Curso;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;
use Illuminate\Database\Eloquent\Builder;

class CursosTable extends AbstractTable
{
    protected Calendario $calendario;

    public function __construct($id)
    {
        $this->calendario = Calendario::findOrFail($id);
    }

    protected function table(): Table
    {
        return (new Table())->model(Curso::class)
            ->query(function (Builder $query) {
                $query->select('cursos.*')->where("calendarios_id", "=", $this->calendario->id);
            })
            ->routes([
                'index'   => ['name' => 'cursos', 'params' => ["id" => $this->calendario->id]],
                'create'  => ['name' => 'curso.create', 'params' => ["id" => $this->calendario->id]],
                'edit'    => ['name' => 'curso.edit'],
                'destroy' => ['name' => 'curso.destroy'],
            ])
            ->destroyConfirmationHtmlAttributes(fn (Curso $curso) => [
                'data-confirm' => __('<< Não será possível desfazer essa operação! >> Confirma apagar o registro de :entry?', [
                    'entry' => $curso->nome,
                ]),
            ]);
    }

    protected function columns(Table $table): void
    {
        $table->column('id')->title("id");
        $table->column('nome')->title("Nome")->sortable(true, 'asc')->searchable();
        $table->column('horas')->title("Horas")->sortable();
        $table->column('inicial')->title("Início")->sortable();
        $table->column('final')->title("Fim")->sortable();
        $table->column('status')->title("Status")->sortable();

        $table->column()->html(function (Curso $curso) {
            $variavel = $curso->id;
            $caminho1 = route("componentes", "");
            $caminho2 = route("turmas", "");
            
            $string = '<a href="' . $caminho1 . "/" . $curso->id . '">ver componentes</a> | <br/>';
            $string = $string . '<a href="' . $caminho2 . "/" . $curso->id . '">ver turma</a>';

            return $string;
        });
    }

    protected function resultLines(Table $table): void
    {
        // 
    }
}
