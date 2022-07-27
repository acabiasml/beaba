<?php

namespace App\Http\Controllers;

use App\Models\Calendario;
use App\Models\Escola;
use App\Http\Requests\StoreCalendarioRequest;
use App\Http\Requests\UpdateCalendarioRequest;
use \App\Tables\CalendariosTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CalendarioController extends Controller{

    public function index($id){
        $escola = Escola::findOrFail($id);;
        $table = (new CalendariosTable($id))->setup();
        return View::make("calendario.calendario")->with(compact('table'))->with("escola", $escola->nome);
    }

    public function create(){
        //
    }

    public function store(StoreCalendarioRequest $request){
        //
    }

    public function edit(Calendario $calendario){
        //
    }

    public function update(UpdateCalendarioRequest $request, Calendario $calendario){
        //
    }

    public function destroy($id){
        $calendario = Calendario::findOrFail($id);        
        $calendario->delete();
        return redirect('escolas');
    }
}
