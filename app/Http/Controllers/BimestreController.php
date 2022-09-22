<?php

namespace App\Http\Controllers;

use App\Models\Bimestre;
use App\Models\Calendario;
use \App\Tables\BimestresTable;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class BimestreController extends Controller
{

    public function index($id)
    {
        $calendario = Calendario::findOrFail($id);
        $table = (new BimestresTable($id))->setup();
        return View::make("bimestre.index")->with(compact('table'))->with("calendario", $calendario);
    }

    public function create($id)
    {
        $calendario = Calendario::findOrFail($id);
        return view("bimestre.create", ["calendario" => $calendario]);
    }

    public function store(Request $request)
    {
        $idCalendario = $request->calendarios_id;

        Bimestre::create([
            "nome" => $request->nome,
            "inicio" => $request->inicio,
            "fim" => $request->fim,
            "calendarios_id" => $idCalendario,
        ]);

        return $this->index($idCalendario);
    }

    public function edit($id)
    {
        $bimestre = Bimestre::findOrFail($id);
        $calendario = Calendario::findOrFail($bimestre->calendarios_id);

        return view("bimestre.edit", ['bimestre' => $bimestre, 'calendario' => $calendario->nome]);
    }

    public function update(Request $request)
    {
        $bimestre = Bimestre::findOrFail($request->id);

        $bimestre->update([
            "nome" => $request->nome,
            "inicio" => $request->inicio,
            "fim" => $request->fim,
        ]);

        return $this->index($request->calendarios_id);
    }

    public function destroy($id)
    {
        $bimestre = Bimestre::findOrFail($id);

        $idCalendario = $bimestre->calendarios_id;

        $bimestre->delete();
        return $this->index($idCalendario);
    }
}
