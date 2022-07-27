<?php

namespace App\Http\Controllers;

use App\Models\Calendario;
use App\Models\Escola;
use \App\Tables\CalendariosTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CalendarioController extends Controller{

    public function index($id){
        $escola = Escola::findOrFail($id);
        $table = (new CalendariosTable($id))->setup();
        return View::make("calendario.calendario")->with(compact('table'))->with("escola", $escola);
    }

    public function create($id){
        $escola = Escola::findOrFail($id);
        return view("calendario.create", ["escola" => $escola]);
    }

    public function store(Request $request){

        $idEscola = $request->escolas_id;

        Calendario::create([
            "nome" => $request->nome,
            "ano" => $request->ano,
            "escolas_id" => $idEscola,
        ]);

        return $this->index($idEscola);
    }

    public function edit($id){
        $calendario = Calendario::findOrFail($id);
        $escola = Escola::findOrFail($calendario->escolas_id);

        return view("calendario.edit", ['calendario' => $calendario, 'escola' => $escola->nome]);
    }

    public function update(Request $request){
        $calendario = Calendario::findOrFail($request->id);

        $calendario->update([
            "nome" => $request->nome,
            "ano" => $request->ano,
        ]);

        return $this->index($request->escolas_id);
    }

    public function destroy($id){
        $calendario = Calendario::findOrFail($id);
        
        $idEscola = $calendario->escolas_id;
        
        $calendario->delete();
        return $this->index($idEscola);
    }
}
