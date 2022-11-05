<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Calendario;
use App\Models\Escola;
use App\Models\Periodo;
use \App\Tables\CursosTable;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
 
class CursoController extends Controller
{
    public function index($id)
    {
        $calendario = Calendario::findOrFail($id);
        $table = (new CursosTable($id))->setup();
        return View::make("curso.index")->with(compact('table'))->with("calendario", $calendario);
    }

    public function create($id)
    {
        $calendario = Calendario::findOrFail($id);
        $escola = Escola::findOrFail($calendario->escolas_id);
        return view("curso.create", ["calendario" => $calendario, "escola" => $escola, "periodos" => Periodo::where('calendarios_id', $id)->pluck('nome', 'id')->toArray()]);
    }

    public function store(Request $request)
    {
        $idCalendario = $request->calendarios_id;

        Curso::create([
            "inicio" => $request->inicio,
            "fim" => $request->fim,
            "nome" => $request->nome,
            "status" => $request->status,
            "calendarios_id" => $idCalendario,
        ]);

        return redirect()->route('cursos', ['id' => $idCalendario]);
    }

    public function show()
    {
        //
    }

    public function edit($id)
    {
        $curso = Curso::findOrFail($id);
        $calendario = Calendario::findOrFail($curso->calendarios_id);
        $escola = Escola::findOrFail($calendario->escolas_id);

        return view("curso.edit", ['curso' => $curso, 'calendario' => $calendario, 'escola' => $escola, "periodos" => Periodo::where('calendarios_id', $curso->calendarios_id)->pluck('nome', 'id')->toArray()]);
    }

    public function update(Request $request)
    {
        $curso = Curso::findOrFail($request->id);

        $curso->update([
            "inicio" => $request->inicio,
            "fim" => $request->fim,
            "nome" => $request->nome,
            "status" => $request->status,
        ]);

        return redirect()->route('cursos', ['id' => $request->calendarios_id]);
    }

    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);

        $idCalendario = $curso->calendarios_id;
        
        $curso->delete();

        return redirect()->route('cursos', ['id' => $idCalendario]);
    }
}
