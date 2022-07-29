<?php

namespace App\Http\Controllers;

use App\Models\Bimestre;
use App\Models\Calendario;
use \App\Tables\BimestresTable;
use Illuminate\Support\Facades\View;
use App\Http\Requests\StoreBimestreRequest;
use App\Http\Requests\UpdateBimestreRequest;

class BimestreController extends Controller
{

    public function index($id)
    {
        $calendario = Calendario::findOrFail($id);
        $table = (new BimestresTable($id))->setup();
        return View::make("bimestre.index")->with(compact('table'))->with("calendario", $calendario);
    }

    public function create()
    {
        //
    }

    public function store(StoreBimestreRequest $request)
    {
        //
    }

    public function show(Bimestre $bimestre)
    {
        //
    }

    public function edit(Bimestre $bimestre)
    {
        //
    }

    public function update(UpdateBimestreRequest $request, Bimestre $bimestre)
    {
        //
    }

    public function destroy(Bimestre $bimestre)
    {
        //
    }
}
