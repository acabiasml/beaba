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

            $este["componente_cumprido"] = Diario::where("componentes_id", $componente->id)->get()->count() + Diario::where("componentes_id", $componente->id)->where("geminada", 1)->get()->count();

            $inicio = Periodo::where("id", $curso->inicio)->pluck("inicio")->first();
            $fim = Periodo::where("id", $curso->fim)->pluck("fim")->first();

            #pegando os períodos que estão entre o início e fim do curso...
            $periodos = Periodo::where("calendarios_id", $curso->calendarios_id)->whereBetween("inicio", [$inicio, $fim])->get();

            $este["componente_periodos_curso"] = $periodos;

            array_push($doProfessor, $este);
        }

        return View::make("diarios.index")->with("doProfessor", $doProfessor);
    }

    public function ver(Request $request)
    {
        $componente = Componente::where("id", $request->componente)->first();
        $periodo = Periodo::where("id", $request->periodo)->first();

        $registrados = Diario::where("componentes_id", $componente->id)
                                ->where("data", ">=", $periodo->inicio)
                                ->where("data", "<=", $periodo->fim)
                                ->orderBy("data", "asc")->get();

        $geminadas = Diario::where("componentes_id", $componente->id)
                                ->where("data", ">=", $periodo->inicio)
                                ->where("data", "<=", $periodo->fim)
                                ->where("geminada", 1)->get()->count();                              

        $somaBimestre = $registrados->count() + $geminadas;

        return View::make("diarios.ver")
                ->with("componente", $componente)
                ->with("periodo", $periodo)
                ->with("curso", $componente->curso)
                ->with("registrados", $registrados)
                ->with("somabimestre", $somaBimestre);
    }

    public function store(Request $request)
    {
        $periodo = Periodo::where("id", $request->periodo)->first();

        $info["componente"] = $request->componente;
        $info["periodo"] = $request->periodo;

        if($request->dia < $periodo->inicio || $request->dia > $periodo->fim){
            $info["errim"] = "erro";
        }else{
            $diario = Diario::updateOrCreate(
                ['data' => $request->dia, 'componentes_id' => $request->componente],
                ['conteudo' =>  $request->conteudo, 'geminada' => $request->geminada],
            );
        }
        return redirect()->route('diarios.ver', $info);
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

    public function destroy(Request $request)
    {
        $conteudo = Diario::findOrFail($request->conteudo);
        $conteudo->delete();

        $info["componente"] = $request->componente;
        $info["periodo"] = $request->periodo;

        return redirect()->route('diario.ver', $info);
    }
}
