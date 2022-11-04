<?php

namespace App\Http\Controllers;

use App\Models\Calendario;
use App\Models\Curso;
use App\Models\Componente;
use App\Models\Escola;
use App\Models\User;
use App\Tables\TurmasTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class TurmaController extends Controller
{
    public function index($id)
    {
        $curso = Curso::findOrFail($id);
        $table = (new TurmasTable($id))->setup();
        return View::make("turma.index")->with(compact('table'))->with("curso", $curso)->with("pessoas", User::where('tipo', 'estud')->pluck('nome', 'id')->toArray());
    }

    public function create($id)
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request)
    {
        
    }

    public function destroy($id)
    {
        
    }
}
