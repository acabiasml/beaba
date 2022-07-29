<?php

namespace App\Tables;

use App\Models\Calendario;
use App\Models\Escola;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;
use Illuminate\Database\Eloquent\Builder;

class CalendariosTable extends AbstractTable
{
    protected Escola $escola;

    public function __construct($id)
    {
        $this->escola = Escola::findOrFail($id);
    }

    protected function table(): Table
    {

        return (new Table())
            ->model(Calendario::class)
            ->query(function (Builder $query) {
                $query->select('calendarios.*')->where("escolas_id", "=", $this->escola->id);
            })
            ->routes([
                'index'   => ['name' => 'calendarios', 'params' => ["id" => $this->escola->id]],
                'create'  => ['name' => 'calendario.create', 'params' => ["id" => $this->escola->id]],
                'edit'    => ['name' => 'calendario.edit'],
                'destroy' => ['name' => 'calendario.destroy'],
            ])
            ->destroyConfirmationHtmlAttributes(fn (Calendario $calendario) => [
                'data-confirm' => __('<< Não será possível desfazer essa operação! >> Confirma apagar o registro de :entry?', [
                    'entry' => $calendario->nome,
                ]),
            ]);
    }

    protected function columns(Table $table): void
    {
        $table->column('id')->title("id");
        $table->column('nome')->title("Nome")->sortable()->searchable();
        $table->column('ano')->title("Ano")->sortable(true, 'asc')->searchable();
        $table->column()->html(function (Calendario $calendario) {
            $caminho = route("bimestres", "");
            $string = '<a href="' . $caminho . "/" . $calendario->id . '">ver bimestres</a>';
            return $string;
        });
        $table->column()->html(function (Calendario $calendario) {
            $caminho = route("cursos", "");
            $string = '<a href="' . $caminho . "/" . $calendario->id . '">ver cursos</a>';
            return $string;
        });
    }


    protected function resultLines(Table $table): void
    {
        //
    }
}
