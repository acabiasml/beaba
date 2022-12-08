<?php

namespace App\Http\Controllers;

use App\Models\Componente;
use App\Models\Diario;
use App\Models\Curso;
use App\Models\Calendario;
use App\Models\User;
use App\Models\Escola;
use App\Models\Area;
use App\Models\Turma;
use App\Models\Media;
use App\Models\Periodo;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
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

        return View::make("diario.index")->with("doProfessor", $doProfessor);
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

        return View::make("diario.ver")
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
        return redirect()->route('diario.ver', $info);
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

    public function print(Request $request)
    {
        $componente = Componente::where("id", $request->componente)->first();
        $professor = User::where("id", $componente->professor)->first();
        $area = Area::where("id", $componente->area_id)->first();
        $curso = Curso::where("id", $componente->cursos_id)->first();
        $calendario = Calendario::where("id", $curso->calendarios_id)->first();
        $periodos = Periodo::where("calendarios_id", $calendario->id)->get();
        $escola = Escola::where("id", $calendario->escolas_id)->first();
        $turma = Turma::where("cursos_id", $curso->id)->get();
        $conteudos = Diario::where("componentes_id", $componente->id)->get();

        $infos = array();

        foreach ($turma as $matricula){
            if($matricula->tipo == "regular"){
                $dados = array();
                $dados["codigo"] = $matricula->users_id;
                $dados["nome"] = $matricula->aluno;

                $notas = array();
                $media = 0;
                $contador = 0;

                foreach($periodos as $bimestre){
                    $consulta = Media::where("users_id", $matricula->users_id)
                                    ->where("componentes_id", $componente->id)
                                    ->where("periodos_id", $bimestre->id)->first();
                    
                    if($consulta == null){
                        $notas[$bimestre->id] = "-";
                    }else{
                        $notas[$bimestre->id] = $consulta->nota;
                        $media = $media + $consulta->nota;
                        $contador = $contador + 1;
                    }
                }

                $dados["notas"] = $notas;
                $dados["media"] = $media / count($periodos);

                if($contador == count($periodos) && $matricula->status != "transferido"){
                    if($dados["media"] >= 6){
                        $dados["resultado"] = "aprovado";
                    }else{
                        $dados["resultado"] = "reprovado";
                    }
                }else{
                    $dados["resultado"] = $matricula->status;
                }

                array_push($infos, $dados);
            } 
        }

        $pdf = app("dompdf.wrapper");
        $pdf->getDomPDF()->set_option("enable_php", true);
        $arquivo = $pdf->loadView("diario.print", ["conteudos" => $conteudos, "infos" => $infos, "turma" => $turma, "escola" => $escola, "curso" => $curso, "calendario" => $calendario, "componente" => $componente, "periodos" => $periodos, "professor" => $professor, "area" => $area])->setPaper('a4', 'landscape');
        return $arquivo->download('diario-turma' . time() . '.pdf');
    }
}
