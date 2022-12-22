<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Componente;
use App\Models\Curso;
use App\Models\Periodo;
use App\Models\Escola;
use App\Models\Calendario;
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

        if($request->opcao == "boletim"){
            $arquivo = $pdf->loadView("relatorio.turboletim", ["componentes" => $componentes, "curso" => $curso, "periodos" => $periodos])->setPaper('a4', 'landscape');
        }else if($request->opcao == "individual"){

        }else if($request->opcao == "matricula"){

        }else if($request->opcao == "chamada"){

        }

        return $arquivo->download('relatorio-turma' . time() . '.pdf');
    }

}
