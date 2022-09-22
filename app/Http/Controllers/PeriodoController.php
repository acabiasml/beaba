<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use App\Models\Calendario;
use App\Models\Escola;
use \App\Tables\PeriodosTable;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{

    public function index($id)
    {
        $calendario = Calendario::findOrFail($id);
        $table = (new PeriodosTable($id))->setup();
        return View::make("periodo.index")->with(compact('table'))->with("calendario", $calendario);
    }

    public function create($id)
    {
        $calendario = Calendario::findOrFail($id);
        $escola = Escola::findOrFail($calendario->escolas_id);
        return view("periodo.create", ["calendario" => $calendario, "escola" => $escola]);
    }

    public function store(Request $request)
    {
        $idCalendario = $request->calendarios_id;

        Periodo::create([
            "nome" => $request->nome,
            "inicio" => $request->inicio,
            "fim" => $request->fim,
            "calendarios_id" => $idCalendario,
        ]);

        return $this->index($idCalendario);
    }

    public function edit($id)
    {
        $periodo = Periodo::findOrFail($id);
        $calendario = Calendario::findOrFail($periodo->calendarios_id);
        $escola = Escola::findOrFail($calendario->escolas_id);

        return view("periodo.edit", ['periodo' => $periodo, 'calendario' => $calendario, 'escola' => $escola]);
    }

    public function update(Request $request)
    {
        $periodo = Periodo::findOrFail($request->id);

        $periodo->update([
            "nome" => $request->nome,
            "inicio" => $request->inicio,
            "fim" => $request->fim,
        ]);

        return $this->index($request->calendarios_id);
    }

    public function destroy($id)
    {
        $periodo = Periodo::findOrFail($id);

        $idCalendario = $periodo->calendarios_id;
        
        $periodo->delete();
        return $this->index($idCalendario);
    }
}
