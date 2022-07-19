<?php

namespace App\Tables;

use App\Models\User;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Okipa\LaravelTable\Table;

class UsersTable extends AbstractTable
{
    /**
     * Configure the table itself.
     *
     * @return \Okipa\LaravelTable\Table
     * @throws \ErrorException
     */
    protected Request $request;
    protected int $idescola;

    public function __construct(Request $request, int $idescola)
    {
        $this->request = $request;
        $this->idescola = $idescola;
    }

    protected function table(): Table
    {
        return (new Table())->model(User::class)
            ->routes([
                'index'   => ['name' => 'pessoas'],
                'create'  => ['name' => 'usercreate'],
                'edit'    => ['name' => 'useredit'],
                'destroy' => ['name' => 'userdestroy'],
            ])
            ->destroyConfirmationHtmlAttributes(fn(User $user) => [
                'data-confirm' => __('Apagar a entrada :entry?', [
                    'entry' => $user->database_attribute,
                ]),
            ])
            ->query(function (Builder $query){
                $query->where("escolafkid", $this->idescola);
            });
    }

    /**
     * Configure the table columns.
     *
     * @param \Okipa\LaravelTable\Table $table
     *
     * @throws \ErrorException
     */
    protected function columns(Table $table): void
    {
        $table->column('name')->title("Nome")->sortable(true, 'asc')->searchable();
        $table->column('tipo')->title("Função")->sortable();
        $table->column('codigo')->title("Turma")->sortable();
    }

    /**
     * Configure the table result lines.
     *
     * @param \Okipa\LaravelTable\Table $table
     */
    protected function resultLines(Table $table): void
    {
        //
    }
}
