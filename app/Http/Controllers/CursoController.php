<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Calendario;
use App\Models\Escola;
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
        return view("curso.create", ["calendario" => $calendario, "escola" => $escola]);
    }

    public function store(Request $request)
    {
        $idCalendario = $request->calendarios_id;

        Curso::create([
            "inicio" => $request->inicio,
            "fim" => $request->fim,
            "nome" => $request->nome,
            "calendarios_id" => $idCalendario,
        ]);

        return $this->index($idCalendario);
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

    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);

        $idCalendario = $curso->calendarios_id;
        
        $curso->delete();
        return $this->index($idCalendario);
    }
}
