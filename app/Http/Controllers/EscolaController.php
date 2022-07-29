<?php

namespace App\Http\Controllers;

use App\Models\Escola;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class EscolaController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        return view("escola.create", ["pessoas" => User::where('tipo', 'admin')->pluck('nome', 'id')->toArray()]);
    }

    public function store(Request $request)
    {
        Escola::create([
            "nome" => $request->nome,
            "fundacao" => $request->fundacao,
            "info" => $request->info,
            "razao" => $request->razao,
            "cnpj" => $request->cnpj,
            "telefone" => $request->telefone,
            "email" => $request->email,
            "site" => $request->site,
            "endereco" => $request->endereco,
            "bairro" => $request->bairro,
            "numero" => $request->numero,
            "cidade" => $request->cidade,
            "estado" => $request->estado,
            "cep" => $request->cep,
            "diretor" => $request->diretor,
            "coordenador" => $request->coordenador,
            "secretario" => $request->secretario,
        ]);
    }

    public function show($id)
    {
        $escola = Escola::findOrFail($id);
        return view("escola.show", ['escola' => $escola, "pessoas" => User::where('tipo', 'admin')->pluck('nome', 'id')->toArray()]);
    }

    public function edit($id)
    {
        $escola = Escola::findOrFail($id);
        return view("escola.edit", ['escola' => $escola, "pessoas" => User::where('tipo', 'admin')->pluck('nome', 'id')->toArray()]);
    }

    public function update(Request $request)
    {
        $escola = Escola::findOrFail($request->id);

        $escola->update([
            "nome" => $request->nome,
            "fundacao" => $request->fundacao,
            "info" => $request->info,
            "razao" => $request->razao,
            "cnpj" => $request->cnpj,
            "telefone" => $request->telefone,
            "email" => $request->email,
            "site" => $request->site,
            "endereco" => $request->endereco,
            "bairro" => $request->bairro,
            "numero" => $request->numero,
            "cidade" => $request->cidade,
            "estado" => $request->estado,
            "cep" => $request->cep,
            "diretor" => $request->diretor,
            "coordenador" => $request->coordenador,
            "secretario" => $request->secretario,
        ]);

        return redirect('escolas');
    }

    public function destroy($id)
    {
        $escola = Escola::findOrFail($id);
        $escola->delete();
        return redirect('escolas');
    }

    public function storeEscola(Request $request)
    {
        $this->store($request);
        return redirect('escolas');
    }

    public function print($id)
    {
        $escola = Escola::findOrFail($id);

        $diretor = "";
        $coordenador = "";
        $secretario = "";

        if (User::find($escola->diretor)) {
            $diretor = User::find($escola->diretor)->nome;
        }

        if (User::find($escola->coordenador)) {
            $coordenador = User::find($escola->coordenador)->nome;
        }

        if (User::find($escola->secretario)) {
            $secretario = User::find($escola->secretario)->nome;
        }

        $arquivo = Pdf::loadView("escola.print", ['escola' => $escola, 'diretor' => $diretor, 'coordenador' => $coordenador, 'secretario' => $secretario])->setPaper('a4', 'portrait');
        return $arquivo->download('ficha-escola' . $escola->id . time() . '.pdf');
    }
}
