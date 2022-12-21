<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RelatorioController extends Controller
{
    public function index(){
        $cursos = Curso::where("status", "iniciado")->get();
        $professores = User::where('tipo', '!=' ,'estud')->get();
        return View::make("relatorios.index")
                        ->with("professores", $professores)
                        ->with("cursos", $cursos);
    }

    public function select(Request $request){
        dd($request);
    }
}
