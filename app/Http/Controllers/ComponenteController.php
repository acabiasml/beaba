<?php

namespace App\Http\Controllers;

use App\Models\Calendario;
use App\Models\Curso;
use App\Models\Componente;
use App\Models\Escola;
use App\Models\User;
use App\Tables\ComponentesTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ComponenteController extends Controller
{
    public function index($id)
    {
        $curso = Curso::findOrFail($id);
        $table = (new ComponentesTable($id))->setup();
        return View::make("componente.index")->with(compact('table'))->with("curso", $curso);
    }

    public function create($id)
    {
        $curso = Curso::findOrFail($id);
        $calendario = Calendario::findOrFail($curso->calendarios_id);
        $escola = Escola::findOrFail($calendario->escolas_id);

        return view("componente.create", ["curso" => $curso, "calendario" => $calendario, "escola" => $escola, "professores" => User::where('tipo', 'prof')->pluck('nome', 'id')->toArray()]);
    }

    public function store()
    {
        //
    }

    public function show()
    {
        //
    }

    public function edit()
    {
        //
    }

    public function update()
    {
        //
    }

    public function destroy()
    {
        //
    }
}
