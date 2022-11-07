<?php

namespace App\Http\Controllers;

use App\Models\Componente;
use App\Models\Diario;
use App\Models\Curso;
use App\Models\Periodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class DiarioController extends Controller
{
    public function index()
    {
        $doProfessor = array();

        $componentes = Componente::where("professor", Auth::user()->id)->orderBy("id", "desc")->get();

        foreach ($componentes as $componente){ 
            $este = array();

            $este["componente_id"] = $componente->id;
            $este["componente_nome"] = $componente->nome;
            $este["componente_horas"] = $componente->horas;

            $curso = Curso::where("id", $componente->cursos_id)->first();

            $este["componente_id_curso"] = $curso->id;
            $este["componente_nome_curso"] = $curso->nome;
            $este["componente_status_curso"] = $curso->status;

            $inicio = Periodo::where("id", $curso->inicio)->pluck("inicio")->first();
            $fim = Periodo::where("id", $curso->fim)->pluck("fim")->first();

            #pegando os períodos que estão entre o início e fim do curso...
            $periodos = Periodo::where("calendarios_id", $curso->calendarios_id)->whereBetween("inicio", [$inicio, $fim])->get();

            $este["componente_periodos_curso"] = $periodos;

            array_push($doProfessor, $este);
        }

        return View::make("diarios.index")->with("doProfessor", $doProfessor);
    }

    public function create()
    {
        //
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
