<?php

namespace App\Tables;

use App\Models\Turma;
use App\Models\Curso;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;
use Illuminate\Database\Eloquent\Builder;

class TurmasTable extends AbstractTable
{
    protected Curso $curso;

    public function __construct($id)
    {
        $this->curso = Curso::findOrFail($id);
    }

    protected function table(): Table
    {
        return (new Table())
            ->model(Turma::class)
            ->query(function (Builder $query) {
                $query->select('turmas.*')->where("cursos_id", "=", $this->curso->id);
            })
            ->routes([
                'index'   => ['name' => 'turmas', 'params' => ["id" => $this->curso->id]],
                'destroy' => ['name' => 'turma.destroy'],
            ])
            ->destroyConfirmationHtmlAttributes(fn (Turma $turma) => [
                'data-confirm' => __('<< Confirma o desligamento de :entry?', [
                    'entry' => $turma->aluno,
                ]),
            ]);
    }

    protected function columns(Table $table): void
    {
        $table->column('id')->title("id");
        $table->column('aluno')->title("Estudante")->sortable();
        $table->column('status')->title("Status")->sortable();
        $table->column('datamatricula')->title("Data de Matrícula")->sortable();
        $table->column('datatransf')->title("Data de Transferência")->sortable();;
    }
}
