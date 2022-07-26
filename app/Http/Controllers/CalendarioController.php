<?php

namespace App\Http\Controllers;

use App\Models\Calendario;
use App\Http\Requests\StoreCalendarioRequest;
use App\Http\Requests\UpdateCalendarioRequest;
use Illuminate\Http\Request;

class CalendarioController extends Controller{

    public function index(Request $request){
        dd($request);
    }

    public function create(){
        //
    }

    public function store(StoreCalendarioRequest $request){
        //
    }

    public function show(Calendario $calendario){
        //
    }

    public function edit(Calendario $calendario){
        //
    }

    public function update(UpdateCalendarioRequest $request, Calendario $calendario){
        //
    }

    public function destroy(Calendario $calendario){
        //
    }
}
