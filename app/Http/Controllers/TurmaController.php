<?php

namespace App\Http\Controllers;

use App\Models\Calendario;
use App\Models\Curso;
use App\Models\Turma;
use App\Models\Escola;
use App\Models\User;
use App\Tables\TurmasTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class TurmaController extends Controller
{
    public function index($id)
    {
        $curso = Curso::findOrFail($id);
        $calendario = Calendario::findOrFail($curso->calendarios_id);
        $escola = Escola::findOrFail($calendario->escolas_id);
        
        $table = (new TurmasTable($id))->setup();

        $naTurma = Turma::pluck("users_id")->all();
        $pessoas = User::where("tipo", "estud")->whereNotIn("id", $naTurma)->pluck("nome", "id")->toArray();

        return View::make("turma.index")->with(compact('table'))
            ->with("curso", $curso)
            ->with("calendario", $calendario)
            ->with("escola", $escola)
            ->with("pessoas", $pessoas);
    }

    public function create($id)
    {
        
    }

    public function store(Request $request)
    {
        Turma::create([
            "datamatricula" => $request->datamatricula,
            "status" => "matriculado",
            "cursos_id" => $request->cursos_id,
            "users_id" => $request->users_id
        ]);

        return redirect()->route('turmas', ['id' => $request->cursos_id]);
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request)
    {
        
    }

    public function destroy($id)
    {
        $turma = Turma::findOrFail($id);

        $turma->update([
            "status" => "transferido",
            "datatransf" => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('turmas', ['id' => $id]);
    }
}
