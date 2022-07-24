<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;

class UserController extends Controller
{
    
    public function index(){
        //
    }

    
    public function create(){
        return view("user.create");
    }

    
    public function store(Request $request){
        User::create([
            "nome" => $request->nome,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "codigo" => $request->codigo,
            "tipo" => $request->tipo,
            "inep" => $request->inep,
            "nomesocial" => $request->nomesocial,
            "nascimento" => $request->nascimento,
            "sexo" => $request->sexo,
            "cor" => $request->cor,
            "gemeo" => $request->gemeo,
            "genitora" => $request->genitora,
            "genitor" => $request->genitor,
            "responsavel" => $request->responsavel,
            "responcpf" => $request->responcpf,
            "respontel1" => $request->respontel1,
            "respontel2" => $request->respontel2,
            "naturalidade" => $request->naturalidade,
            "naturaif" => $request->naturaif,
            "identidade" => $request->identidade,
            "identemissor" => $request->identemissor,
            "identuf" => $request->identuf,
            "identexpedicao" => $request->identexpedicao,
            "cpf" => $request->cpf,
            "docextrangeiro" => $request->docextrangeiro,
            "certidao" => $request->certidao,
            "certifolha" => $request->certifolha,
            "certilivro" => $request->certilivro,
            "certiemissao" => $request->certiemissao,
            "titulo" => $request->titulo,
            "titulozona" => $request->titulozona,
            "titulosessao" => $request->titulosessao,
            "titulouf" => $request->titulouf,
            "docmilitar" => $request->docmilitar,
            "endereco" => $request->endereco,
            "endnumero" => $request->endnumero,
            "endbairro" => $request->endbairro,
            "endcidade" => $request->endcidade,
            "endcomplemento" => $request->endcomplemento,
            "endcep" => $request->endcep,
            "enduf" => $request->enduf,
            "telefone1" => $request->telefone1,
            "telefone2" => $request->telefone2,
            "cartaosus" => $request->cartaosus,
            "tiposangue" => $request->tiposangue,
            "nutricionais" => $request->nutricionais,
            "nis" => $request->nis,
            "carteiratrab" => $request->carteiratrab,
            "habilitacao" => $request->habilitacao,
            "habilcategoria" => $request->habilcategoria,
            "habilvalidade" => $request->habilvalidade,
            "banco" => $request->banco,
            "agencia" => $request->agencia,
            "conta" => $request->conta,
        ]);
    }

    public function show($id){
        $usuario = User::findOrFail($id);
        return view("user.show", ['usuario' => $usuario]);
    }

    
    public function edit($id){
        $usuario = User::findOrFail($id);
        return view("user.edit", ['usuario' => $usuario]);
    }

    
    public function update(Request $request){
        $usuario = User::findOrFail($request->id);

        $usuario->update([
            "nome" => $request->nome,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "codigo" => $request->codigo,
            "tipo" => $request->tipo,
            "inep" => $request->inep,
            "nomesocial" => $request->nomesocial,
            "nascimento" => $request->nascimento,
            "sexo" => $request->sexo,
            "cor" => $request->cor,
            "gemeo" => $request->gemeo,
            "genitora" => $request->genitora,
            "genitor" => $request->genitor,
            "responsavel" => $request->responsavel,
            "responcpf" => $request->responcpf,
            "respontel1" => $request->respontel1,
            "respontel2" => $request->respontel2,
            "naturalidade" => $request->naturalidade,
            "naturaif" => $request->naturaif,
            "identidade" => $request->identidade,
            "identemissor" => $request->identemissor,
            "identuf" => $request->identuf,
            "identexpedicao" => $request->identexpedicao,
            "cpf" => $request->cpf,
            "docextrangeiro" => $request->docextrangeiro,
            "certidao" => $request->certidao,
            "certifolha" => $request->certifolha,
            "certilivro" => $request->certilivro,
            "certiemissao" => $request->certiemissao,
            "titulo" => $request->titulo,
            "titulozona" => $request->titulozona,
            "titulosessao" => $request->titulosessao,
            "titulouf" => $request->titulouf,
            "docmilitar" => $request->docmilitar,
            "endereco" => $request->endereco,
            "endnumero" => $request->endnumero,
            "endbairro" => $request->endbairro,
            "endcidade" => $request->endcidade,
            "endcomplemento" => $request->endcomplemento,
            "endcep" => $request->endcep,
            "enduf" => $request->enduf,
            "telefone1" => $request->telefone1,
            "telefone2" => $request->telefone2,
            "cartaosus" => $request->cartaosus,
            "tiposangue" => $request->tiposangue,
            "nutricionais" => $request->nutricionais,
            "nis" => $request->nis,
            "carteiratrab" => $request->carteiratrab,
            "habilitacao" => $request->habilitacao,
            "habilcategoria" => $request->habilcategoria,
            "habilvalidade" => $request->habilvalidade,
            "banco" => $request->banco,
            "agencia" => $request->agencia,
            "conta" => $request->conta,
        ]);

        return redirect('pessoas');
    }

    public function destroy($id){
        $usuario = User::findOrFail($id);        
        $usuario->delete();
        return redirect('pessoas');
    }

    public function autenticar(Request $request){

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'É necessário informar o e-mail.',
            'password.required' => 'É necessário informar a senha.'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->intended('/home');
        }else{
            return redirect()->back()->with('danger', 'Combinação e-mail e senha inválida.');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }

    public function storeFirst(Request $request){
        if(User::count() == 0){
            $this->store($request);
            return redirect('paglogin');
        }
    }

    public function storeUser(Request $request){
        $this->store($request);
        return redirect('pessoas');
    }

    public function print($id){
        $usuario = User::findOrFail($id);
        $arquivo = Pdf::loadView("user.print", ['usuario' => $usuario])->setPaper('a4', 'portrait');
        return $arquivo->download('ficha-user'.$usuario->id.time().'.pdf');
    }
}
