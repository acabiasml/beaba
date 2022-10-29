<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Componente;
use App\Tables\ComponentesTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ComponenteController extends Controller
{
    public function index($id)
    {
        $curso = Curso::findOrFail($id);
        $table = (new ComponentesTable($id))->setup();
        return View::make("componente.index")->with(compact('table'))->with("curso", $curso);
    }

    public function create()
    {
        //
    }

    public function store()
    {
        //
    }

    public function show()
    {
        //
    }

    public function edit()
    {
        //
    }

    public function update()
    {
        //
    }

    public function destroy()
    {
        //
    }
}
