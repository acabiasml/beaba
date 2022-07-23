<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        return view("user.create");
    }

    
    public function store(Request $request)
    {
        User::create([
            "nome" => $request->nome,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "tipo" => $request->tipo,
        ]);

        return view("paglogin");
    }

    public function show($id)
    {
        $usuario = User::findOrFail($id);
        return view("user.show", ['usuario' => $usuario]);
    }

    
    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        return view("user.edit", ['usuario' => $usuario]);
    }

    
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
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
            return $this->store($request);
        }
    }
}
