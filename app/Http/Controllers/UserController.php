<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
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
}
