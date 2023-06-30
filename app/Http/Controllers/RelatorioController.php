<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Calendario;
use App\Models\Componente;
use App\Models\Curso;
use App\Models\Diario;
use App\Models\Escola;
use App\Models\Frequencia;
use App\Models\Media;
use App\Models\Periodo;
use App\Models\Turma;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Barryvdh\DomPDF\Facade\Pdf;

class RelatorioController extends Controller
{
    public function index(){
        $cursos = Curso::where("status", "!=", "finalizado")->get();
        $professores = User::where('tipo', '!=' ,'estud')->orderBy('nome', 'asc')->get();
        return View::make("relatorio.index")
                        ->with("professores", $professores)
                        ->with("cursos", $cursos);
    }

    public function select(Request $request){
        
        $pdf = app("dompdf.wrapper");
        $pdf->getDomPDF()->set_option("enable_php", true);

        $curso = Curso::where("id", $request->curso)->first();
        $periodos = Periodo::where("calendarios_id", $curso->calendarios_id)->get();
        $componentes = Componente::where("cursos_id", $curso->id)->get();
        $areas = Area::whereIn("id", Componente::where("cursos_id", $curso->id)->pluck("area_id")->unique())->get();
        $turma = Turma::where("cursos_id", $curso->id)->get();
      

        if($request->opcao == "boletim" || $request->opcao == "boletimconc"){

            $boletim["curso-id"] = $curso->id;
            $boletim["curso-nome"] = $curso->nome;
            $boletim["curso-modalidade"] = $curso->modalidade;

            $boletim["periodos"] = array();
            
            foreach($periodos as $periodo){
                
                $esteperiodo = array();
                $esteperiodo["periodo-id"] = $periodo->id;
                $esteperiodo["periodo-nome"] = $periodo->nome;

                $esteperiodo["alunos"] = array();

                foreach($turma as $matricula){

                    if($matricula->datamatricula <= $periodo->fim){
                        if($matricula->datatransf == null || $matricula->datatransf > $periodo->inicio){
                            $estealuno = array();
                            $estealuno["aluno-id"] = $matricula->users_id;
                            $estealuno["aluno-nome"] = $matricula->aluno;

                            $estealuno["areas"] = array();
                            foreach($areas as $area){
                                $estaarea = array();
                                $estaarea["area-id"] = $area->id;
                                $estaarea["area-nome"] = $area->nome;

                                $estaarea["componentes"] = array();

                                foreach($componentes as $componente){
                                    if($componente->area_id == $area->id){
                                        $estecomponente = array();
                                        $estecomponente["componente-id"] = $componente->id;
                                        $estecomponente["componente-nome"] = $componente->nome;

                                        $amedia = Media::where("componentes_id", $componente->id)
                                                        ->where("users_id", $matricula->users_id)
                                                        ->where("periodos_id", $periodo->id)->first();

                                        if($amedia == null){
                                            $estecomponente["componente-media"] = "-";
                                        }else{
                                            $estecomponente["componente-media"] = $amedia->nota;
                                        }

                                        array_push($estaarea["componentes"], $estecomponente);
                                    }
                                }

                                array_push($estealuno["areas"], $estaarea);
                            }
                    
                            array_push($esteperiodo["alunos"], $estealuno);
                        }
                    }
                }

                array_push($boletim["periodos"], $esteperiodo);
            }

            if($request->opcao == "boletim"){
                $arquivo = $pdf->loadView("relatorio.turboletim", ["dados" => $boletim, "curso" => $curso])->setPaper('a4', 'landscape');
            }else{
                $arquivo = $pdf->loadView("relatorio.turboletimconc", ["dados" => $boletim, "curso" => $curso])->setPaper('a4', 'landscape');
            }
            
        }else if($request->opcao == "individual"){

            $individual = array();

            foreach ($turma as $matricula){
                
                $estudante = User::where("id", $matricula->users_id)->first();
                
                if($matricula->tipo == "regular"){

                    $estealuno = array();
                    $estealuno["aluno"] = $estudante;

                    $estealuno["datamatricula"] = $matricula->datamatricula;
                    $estealuno["datatransferencia"] = $matricula->datatransf;

                    $estealuno["totalhoras"] = 0;
                    $estealuno["totalhorascumpridas"] = 0;
                    
                    $contadorReprovado = 0;

                    $estealuno["areas"] = array();
                    foreach($areas as $area){
                        $estaarea["nome"] = $area->nome;
                        
                        $estaarea["componentes"] = array();
                        foreach($componentes as $componente){
                            if($componente->area_id == $area->id){

                                $estealuno["totalhoras"] = $estealuno["totalhoras"] + $componente->horas;

                                $estecomponente["nome"] = $componente->nome;
                                $estecomponente["CHP"] = $componente->horas;

                                $estecomponente["notas"] = array();
                                $media = 0;
                                $totalfaltas = 0;
                                $contador = 0;

                                foreach($periodos as $periodo){
                                    $esteperiodo["nome"] = $periodo->nome;
                                    
                                    $consulta = Media::where("users_id", $matricula->users_id)
                                        ->where("componentes_id", $componente->id)
                                        ->where("periodos_id", $periodo->id)->first();
                        
                                    if($consulta == null){
                                        $esteperiodo["periodo-media"] = "-";
                                    }else{
                                        $esteperiodo["periodo-media"] = number_format($consulta->nota, 2, '.', '');
                                        $media = $media + $consulta->nota;
                                        $contador = $contador + 1;
                                    }

                                    $diasbimestre = Diario::where("componentes_id", $componente->id)
                                                            ->where("data", ">=", $periodo->inicio)
                                                            ->where("data", "<=", $periodo->fim)
                                                            ->get();

                                    $esteperiodo["periodo-faltas"] = 0;
                                    foreach($diasbimestre as $dia){

                                        $verifica = Frequencia::where("users_id", $matricula->users_id)
                                                            ->where("diarios_id", $dia->id)->first();

                                        if($verifica != null && $verifica->presenca == "F"){
                                            $totalfaltas = $totalfaltas + 1;
                                            $esteperiodo["periodo-faltas"] =  $esteperiodo["periodo-faltas"] + 1;
                                        }
                                    }

                                    array_push($estecomponente["notas"], $esteperiodo);
                                }

                                $estecomponente["TF"] = $totalfaltas;
                                $estecomponente["MF"] = number_format(round($media / count($periodos)), 2, '.', '');

                                if($matricula->status != "transferido" && $matricula->status != "reclassificado"){
                                    if($estecomponente["MF"] >= 5.5){
                                        $estecomponente["RF"] = "APROV.";
                                    }else{
                                        $contadorReprovado = $contadorReprovado + 1;
                                        $estecomponente["RF"] = "REPROV.";
                                    }
                                }else{
                                    $estecomponente["RF"] = "-";
                                }

                                #$horasfull = count(Diario::where("componentes_id", $componente->id)->get());

                                $estecomponente["CHC"] = $componente->horas - $totalfaltas;
                                $estealuno["totalhorascumpridas"] = $estealuno["totalhorascumpridas"] + $estecomponente["CHC"];

                                array_push($estaarea["componentes"], $estecomponente);
                            }
                        }

                        array_push($estealuno["areas"], $estaarea);
                    }

                    if($matricula->status == "transferido"){
                        $estealuno["resultado"] = "TRANSFERIDO";
                    }else if($matricula->status == "reclassificado"){
                            $estealuno["resultado"] = "RECLASSIFICADO";
                    }else{
                        if($contadorReprovado == 0){
                            $estealuno["resultado"] = "APROVADO";
                        }else if($contadorReprovado < 2){
                            $estealuno["resultado"] = "APROVADO COM DEPENDÊNCIA";
                        }else{
                            $estealuno["resultado"] = "RETIDO";
                        }
                    }



                    array_push($individual, $estealuno);
                }
            }

            #dd(json_encode($individual, JSON_PRETTY_PRINT));

            #return View::make("relatorio.fichaindividual")->with("dados", $individual)->with("curso", $curso);
            
            $arquivo = $pdf->loadView("relatorio.fichaindividual", ["dados" => $individual, "curso" => $curso])->setPaper('a4', 'portrait');

        }else if($request->opcao == "matricula"){

        }else if($request->opcao == "chamada"){

        }

        return $arquivo->download('relatorio-turma' . time() . '.pdf');
    }

}
