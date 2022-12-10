<?php

namespace App\Http\Controllers;

use App\Models\Componente;
use App\Models\Diario;
use App\Models\Frequencia;
use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FrequenciaController extends Controller
{
    public function index(Request $request)
    {
        $dia = Diario::findOrFail($request->diario);
        $componente = Componente::findOrFail($dia->componentes_id);
        $turma = Turma::where("cursos_id", $componente->cursos_id)->get();

        $frequencias = array();

        foreach ($turma as $matricula){
            $variavel = array();
            $variavel["id"] = $matricula->users_id;
            $variavel["nome"] = $matricula->aluno;
            
            $consulta = Frequencia::where("diarios_id", $dia->id)
                                    ->where("users_id", $matricula->users_id)->first();
            
            if($consulta == null){
                $variavel["chamada"] = "P";
            }else{
                $variavel["chamada"] = $consulta->presenca;
            }

            array_push($frequencias, $variavel);
        }

        return View::make("frequencia.ver")->with("componente", $componente)
                                            ->with("curso", $componente->curso)
                                            ->with("chamada", $dia)
                                            ->with("frequencias", $frequencias);
    }

    public function create()
    {
        //
    }

    public function store()
    {
        //
    }

    public function show(Frequencia $frequencia)
    {
        //
    }

    public function edit(Frequencia $frequencia)
    {
        //
    }

    public function update(Request $request)
    {

        $consulta = Frequencia::where("diarios_id", $request->dia)
                                    ->where("users_id", $request->aluno)->first();
            
        if($consulta == null){
            Frequencia::create([
                "presenca" => "F",
                "diarios_id" => $request->dia,
                "users_id" => $request->aluno,
            ]);
        }else{
            
            $atualiza = Frequencia::findOrFail($consulta->id);

            if($atualiza->presenca == "F"){
                $atualiza->update([
                    "presenca" => "P",
                ]);
            }else{
                $atualiza->update([
                    "presenca" => "F",
                ]);
            }
        }

        $info["diario"] = $request->dia;

        return redirect()->route('frequencia.ver', $info);
    }

    public function destroy()
    {
        //
    }
}
