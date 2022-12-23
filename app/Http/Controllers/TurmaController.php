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

        $naTurma = Turma::where("status", "matriculado")->where("cursos_id", $id)->pluck("users_id")->all();
        $pessoas = User::where("tipo", "estud")->whereNotIn("id", $naTurma)->orderBy('nome', 'asc')->pluck("nome", "id")->toArray();
        
        $foraTransferidos = Turma::where("status", "!=", "transferido")->where("status", "!=", "reclassificado")->where("cursos_id", $id)->pluck("users_id")->all();
        $matriculados = User::whereIn("id", $foraTransferidos)->orderBy("nome", "asc")->pluck("nome", "id")->toArray();
        $corrermatriculados = User::whereIn("id", $foraTransferidos)->orderBy("nome", "asc")->get();

        $cursos = Curso::where("calendarios_id", $curso->calendarios_id)->get();

        return View::make("turma.index")->with(compact('table'))
            ->with("curso", $curso)
            ->with("calendario", $calendario)
            ->with("escola", $escola)
            ->with("matriculados", $matriculados)
            ->with("pessoas", $pessoas)
            ->with("correr", $corrermatriculados)
            ->with("cursos", $cursos);
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

    public function destroy(Request $request)
    {
        $turma = Turma::where("users_id", '=', $request->users_id)->where("cursos_id", "=", $request->cursos_id)->first();

        $turma->update([
            "status" => "transferido",
            "usertransf" => Auth::user()->id,
            "datatransf" => $request->datatransf,
        ]);

        return redirect()->route('turmas', ['id' => $turma->cursos_id]);
    }

    public function reclassificar(Request $request){

        $reclassificado = User::where("id", $request->aluno)->first();
        $cursoantigo = Curso::where("id", $request->antigocurso)->first();
        $cursonovo = Curso::where("id", $request->novocurso)->first();

        $turmaantiga = Turma::where("cursos_id", $cursoantigo->id)
                                ->where("users_id", $reclassificado->id)->first();

        $user = Turma::updateOrCreate(
            ['cursos_id' =>  $cursonovo->id, 'users_id' => $reclassificado->id],
            ['datamatricula' => $turmaantiga->datamatricula, 'status' => 'matriculado', 'tipo' => 'regular']
        );

        $turmaantiga->status = "reclassificado";
        $turmaantiga->save();

        return redirect()->route('turmas', ['id' => $request->antigocurso]);
    }
}
