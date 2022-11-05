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
use Illuminate\Support\Facades\Auth;

class TurmaController extends Controller
{
    public function index($id)
    {
        $curso = Curso::findOrFail($id);
        $calendario = Calendario::findOrFail($curso->calendarios_id);
        $escola = Escola::findOrFail($calendario->escolas_id);
        
        $table = (new TurmasTable($id))->setup();

        $naTurma = Turma::where("status", "matriculado")->pluck("users_id")->all();
        $pessoas = User::where("tipo", "estud")->whereNotIn("id", $naTurma)->orderBy('nome', 'asc')->pluck("nome", "id")->toArray();
        
        $foraTransferidos = Turma::where("status", "!=", "transferido")->pluck("users_id")->all();
        $matriculados = User::whereIn("id", $foraTransferidos)->orderBy("nome", "asc")->pluck("nome", "id")->toArray();

        return View::make("turma.index")->with(compact('table'))
            ->with("curso", $curso)
            ->with("calendario", $calendario)
            ->with("escola", $escola)
            ->with("matriculados", $matriculados)
            ->with("pessoas", $pessoas);
    }

    public function create($id)
    {
        
    }

    public function store(Request $request)
    {
        Turma::create([
            "datamatricula" => $request->datamatricula,
            "usermatricula" => Auth::user()->id,
            "tipo" => $request->tipo,
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

    public function destroy(Request $request)
    {
        $turma = Turma::where("users_id", '=', $request->users_id)->where("cursos_id", "=", $request->cursos_id)->first();

        $turma->update([
            "status" => "transferido",
            "usertransf" => Auth::user()->id,
            "datatransf" => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('turmas', ['id' => $turma->cursos_id]);
    }
}
