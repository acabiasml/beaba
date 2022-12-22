<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Calendario;
use App\Models\Componente;
use App\Models\Curso;
use App\Models\Escola;
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
        $cursos = Curso::where("status", "iniciado")->get();
        $professores = User::where('tipo', '!=' ,'estud')->get();
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
        }else if($request->opcao == "boletimconc"){
            $arquivo = $pdf->loadView("relatorio.turboletimconc", ["dados" => $boletim, "curso" => $curso])->setPaper('a4', 'landscape');
        }else if($request->opcao == "individual"){

        }else if($request->opcao == "matricula"){

        }else if($request->opcao == "chamada"){

        }

        return $arquivo->download('relatorio-turma' . time() . '.pdf');
    }

}
