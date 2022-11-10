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
            ]);
    }

    protected function columns(Table $table): void
    {
        $table->column('id')->title("id");
        $table->column('aluno')->title("Estudante");
        $table->column('status')->title("Status")->sortable()->searchable();
        $table->column('tipo')->title("Tipo")->sortable()->searchable();
        $table->column('quemmatriculou')->title("Matriculado por");
        $table->column('datamatricula')->title("Data de Matrícula")->sortable()->dateTimeFormat("d-m-Y");
        $table->column('quemtransferiu')->title("Transferido por"); 
        $table->column('datatransf')->title("Data de Transferência")->sortable()->dateTimeFormat("d-m-Y");
    }
}
