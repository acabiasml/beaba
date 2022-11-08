<?php

namespace App\Http\Controllers;

use App\Models\Componente;
use App\Models\Media;
use App\Models\Curso;
use App\Models\Turma;
use App\Models\User;
use App\Models\Periodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MediaController extends Controller
{

    public function index(Request $request)
    {
        $componente = Componente::where("id", $request->componente)->first();
        $periodo = Periodo::where("id", $request->periodo)->first();

        $turma = Turma::where("cursos_id", $componente->cursos_id)->get();
        $transferidos = array();
        $ativos = array();

        foreach ($turma as $matricula){ 
            if($matricula->status == "transferido" && $matricula->datatransf < $periodo->inicio){
                array_push($transferidos, $matricula->users_id);
            }else{
                $media = Media::where("componentes_id", $componente->id)
                ->where("periodos_id", $periodo->id)
                ->where("users_id", $matricula->users_id)->first();
            
                $aluno = User::where("id", $matricula->users_id)->first();  
                
                $nota = 0;

                if($media){
                    $nota = $media->nota;
                }

                array_push($ativos, ["id" => $aluno->id, "nome" => $aluno->nome, "media" => $nota]);
            }
        }

        $alunosTransferidos = User::whereIn("id", $transferidos)->orderBy('nome', 'asc')->get();

        return View::make("media.index")
            ->with("componente", $componente)
            ->with("curso", $componente->curso)
            ->with("ativos", $ativos)
            ->with("alunosTransferidos", $alunosTransferidos)
            ->with("periodo", $periodo);
    }

    public function store(Request $request)
    {
        $media = Media::updateOrCreate(
            ['users_id' => $request->aluno, 'componentes_id' => $request->componente, 'periodos_id' => $request->periodo],
            ['nota' =>  $request->nota],
        );

        return redirect()->route('medias', ['componente' => $request->componente, 'periodo' => $request->periodo]);
    }
}
