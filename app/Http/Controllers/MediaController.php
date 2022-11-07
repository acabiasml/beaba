<?php

namespace App\Http\Controllers;

use App\Models\Componente;
use App\Models\Media;
use App\Models\Turma;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMediaRequest;
use App\Http\Requests\UpdateMediaRequest;

class MediaController extends Controller
{

    public function index(Request $request)
    {
        $componente = Componente::where("id", $request->componente)->first();
        $alunos = Turma::where("cursos_id", $componente->cursos_id)->pluck("users_id")->all();
        $pessoas = User::whereIn("id", $alunos)->orderBy('nome', 'asc')->pluck("nome", "id")->all();
        
        dd($pessoas);
    }

    public function create()
    {
        //
    }

    public function store(StoreMediaRequest $request)
    {
        //
    }

    public function show(Media $media)
    {
        //
    }

    public function edit(Media $media)
    {
        //
    }

    public function update(UpdateMediaRequest $request, Media $media)
    {
        //
    }

    public function destroy(Media $media)
    {
        //
    }
}
