<?php

namespace App\Http\Controllers;

use App\Models\Calendario;
use App\Models\Curso;
use App\Models\Componente;
use App\Models\Escola;
use App\Models\User;
use App\Models\Area;
use App\Tables\ComponentesTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ComponenteController extends Controller
{
    public function index($id)
    {
        
        $curso = Curso::findOrFail($id);
        $calendario = Calendario::findOrFail($curso->calendarios_id);
        $escola = Escola::findOrFail($calendario->escolas_id);
        $table = (new ComponentesTable($id))->setup();
        return View::make("componente.index")->with(compact('table'))
            ->with("curso", $curso)
            ->with("calendario", $calendario)
            ->with("escola", $escola);
    }

    public function create($id)
    {
        $area = Area::all()->pluck('nome', 'id')->toArray();
        $curso = Curso::findOrFail($id);
        $calendario = Calendario::findOrFail($curso->calendarios_id);
        $escola = Escola::findOrFail($calendario->escolas_id);
        $professores = User::where('tipo', '!=' ,'estud')->pluck('nome', 'id')->toArray();

        return view("componente.create", ["area" => $area, "curso" => $curso, "calendario" => $calendario, "escola" => $escola, "professores" => $professores]);
    }

    public function store(Request $request)
    {
        Componente::create([
            "nome" => $request->nome,
            "horas" => $request->horas,
            "area_id" => $request->area_id,
            "cursos_id" => $request->cursos_id,
            "professor" => $request->professor
        ]);

        return redirect()->route('componentes', ['id' => $request->cursos_id]);
    }

    public function edit($id)
    {
        $area = Area::all()->pluck('nome', 'id')->toArray();
        $componente = Componente::findOrFail($id);
        $curso = Curso::findOrFail($componente->cursos_id);
        $calendario = Calendario::findOrFail($curso->calendarios_id);
        $escola = Escola::findOrFail($calendario->escolas_id);

        return view("componente.edit", ["area" => $area, "componente"=> $componente, "curso" => $curso, "calendario" => $calendario, "escola" => $escola, "professores" => User::where('tipo', '!=' ,'estud')->pluck('nome', 'id')->toArray()]);
    }

    public function update(Request $request)
    {
        $componente = Componente::findOrFail($request->id);

        $componente->update([
            "nome" => $request->nome,
            "horas" => $request->horas,
            "area_id" => $request->area_id,
            "professor" => $request->professor
        ]);

        return redirect()->route('componentes', ['id' => $request->cursos_id]);
    }

    public function destroy($id)
    {
        $componente = Componente::findOrFail($id);

        $idCurso = $componente->cursos_id;
        
        $componente->delete();

        return redirect()->route('componentes', ['id' => $idCurso]);
    }
}
