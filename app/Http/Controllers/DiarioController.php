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
use App\Models\Frequencia;
use App\Models\Periodo;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class DiarioController extends Controller
{
    public function index(Request $request)
    {
        $doProfessor = array();

        if($request->professor == null){
            $professor = Auth::user()->id;
        }else{
            $professor = $request->professor;
        }

        $profissional = User::where('id', $professor)->first();
        $componentes = Componente::where("professor", $professor)->orderBy("id", "desc")->get();

        foreach ($componentes as $componente){ 
            $este = array();

            $este["componente_id"] = $componente->id;
            $este["componente_nome"] = $componente->nome;
            $este["componente_horas"] = $componente->horas;

            $curso = Curso::where("id", $componente->cursos_id)->first();

            $este["componente_id_curso"] = $curso->id;
            $este["componente_nome_curso"] = $curso->nome;
            $este["componente_status_curso"] = $curso->status;

            $este["componente_cumprido"] = Diario::where("componentes_id", $componente->id)->get()->count() + Diario::where("componentes_id", $componente->id)->where("geminada", 2)->get()->count();

            $inicio = Periodo::where("id", $curso->inicio)->pluck("inicio")->first();
            $fim = Periodo::where("id", $curso->fim)->pluck("fim")->first();

            #pegando os períodos que estão entre o início e fim do curso...
            $periodos = Periodo::where("calendarios_id", $curso->calendarios_id)->whereBetween("inicio", [$inicio, $fim])->get();

            $este["componente_periodos_curso"] = $periodos;

            array_push($doProfessor, $este);
        }

        return View::make("diario.index")->with("doProfessor", $doProfessor)->with("profissional", $profissional);
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
                                ->where("geminada", 2)->get()->count();                              

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

    public function destroy(Request $request)
    {
        $diario = Diario::findOrFail($request->diario);
        $diario->delete();

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

        $diariosbimestre = array();
        foreach($periodos as $bimestre){
            $essebimestre = Diario::where("componentes_id", $componente->id)
                                    ->where("data", ">=", $bimestre->inicio)
                                    ->where("data", "<=", $bimestre->fim)                        
                                    ->get();
            array_push($diariosbimestre, $essebimestre);
        }

        $infos = array();

        foreach ($turma as $matricula){
            if($matricula->tipo == "regular"){
                $dados = array();
                $dados["codigo"] = $matricula->users_id;
                $dados["nome"] = $matricula->aluno;

                $notas = array();
                $faltas = array();
                $diasletivos = array();
                $faltasporbimestre = array();
                $media = 0;
                $totalfaltas = 0;
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

                    $diasbimestre = Diario::where("componentes_id", $componente->id)
                                            ->where("data", ">=", $bimestre->inicio)
                                            ->where("data", "<=", $bimestre->fim)
                                            ->get();

                    $diasdessebimestre = array();
                    
                    $faltadessealuno = 0;

                    foreach($diasbimestre as $dia){
                        
                        $umadata = array();

                        $verifica = Frequencia::where("users_id", $matricula->users_id)
                                            ->where("diarios_id", $dia->id)->first();
                        
                        $umadata["data"] = $dia->data;

                        if($matricula->status == "transferido"){
                            $datalimite = $matricula->datatransf;
                        }else{
                            $datalimite = $bimestre->fim;
                        }

                        if($dia->data >= $matricula->datamatricula && $dia->data <= $datalimite){
                            if($verifica == null){
                                $umadata["chamada"] = "*";
                            }else{
                                if($verifica->presenca == "P"){
                                    $umadata["chamada"] = "*";
                                }else{
                                    $faltadessealuno = $faltadessealuno + 1;
                                    $umadata["chamada"] = "F";
                                }
                            }
                        }else{
                            $umadata["chamada"] = "#";
                        }

                        array_push($diasdessebimestre, $umadata);
                    }
                    
                    array_push($diasletivos, $diasdessebimestre);
                    
                    $consulta2 = Frequencia::where("users_id", $matricula->users_id)
                                    ->where("presenca", "F")
                                    ->whereIn("diarios_id", $diasbimestre->pluck("id"))->get();                

                    if($consulta2->isEmpty()){
                        $faltas[$bimestre->id] = "-";
                    }else{
                        $faltas[$bimestre->id] = $consulta2->count();
                        $totalfaltas = $totalfaltas + $consulta2->count();
                    }
                    
                    array_push($faltasporbimestre, $faltadessealuno);
                }

                $dados["faltanessebim"] = $faltasporbimestre;
                $dados["diasletivos"] = $diasletivos;
                $dados["notas"] = $notas;

                if($matricula->status == "transferido"){
                    $dados["media"] = "-";
                }else{
                    $dados["media"] = $media / count($periodos);
                }

                $dados["faltas"] = $faltas;
                $dados["totalfaltas"] = $totalfaltas;

                if($matricula->status != "transferido" && $contador == count($periodos)){
                    if(($media / count($periodos)) >= 5.5){
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
        $arquivo = $pdf->loadView("diario.print", ["diariosbimestre" => $diariosbimestre, "infos" => $infos, "turma" => $turma, "escola" => $escola, "curso" => $curso, "calendario" => $calendario, "componente" => $componente, "periodos" => $periodos, "professor" => $professor, "area" => $area])->setPaper('a4', 'landscape');
        return $arquivo->download('diario-turma' . time() . '.pdf');
    }
}
