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

class HistoricoController extends Controller
{
    public function index(){
        return View::make("historico.index");
    }

}
