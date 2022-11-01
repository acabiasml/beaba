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

        return view("componente.create", ["curso" => $curso, "calendario" => $calendario, "escola" => $escola, "professores" => User::where('tipo', '!=' ,'estud')->pluck('nome', 'id')->toArray()]);
    }

    public function store(Request $request)
    {
        Componente::create([
            "nome" => $request->nome,
            "horas" => $request->horas,
            "cursos_id" => $request->cursos_id,
            "professor" => $request->professor
        ]);

        return $this->index($request->cursos_id);
    }

    public function edit($id)
    {
        $componente = Componente::findOrFail($id);
        $curso = Curso::findOrFail($componente->cursos_id);
        $calendario = Calendario::findOrFail($curso->calendarios_id);
        $escola = Escola::findOrFail($calendario->escolas_id);

        return view("componente.edit", ["componente"=> $componente, "curso" => $curso, "calendario" => $calendario, "escola" => $escola, "professores" => User::where('tipo', '!=' ,'estud')->pluck('nome', 'id')->toArray()]);
    }

    public function update(Request $request)
    {
        $componente = Componente::findOrFail($request->id);

        $componente->update([
            "nome" => $request->nome,
            "horas" => $request->horas,
            "professor" => $request->professor
        ]);

        return $this->index($request->cursos_id);
    }

    public function destroy($id)
    {
        $componente = Componente::findOrFail($id);

        $idCurso = $componente->cursos_id;
        
        $componente->delete();
        return $this->index($idCurso);
    }
}
