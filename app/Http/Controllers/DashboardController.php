<?php

namespace App\Http\Controllers;
use \App\Tables\UsersTable;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function home(){
        return view("principais.home");
    }

    public function biblioteca(){
        return view("principais.biblioteca");
    }

    public function escola(){
        return view("principais.escola");
    }

    public function pessoas(Request $request){
        $table = (new UsersTable($request))->setup();
        return view("principais.pessoas", compact("table"));
    }

    public function diarios(){
        return view("principais.diarios");
    }

    public function relatorios(){
        return view("principais.relatorios");
    }

    public function turmas(){
        return view("principais.turmas");
    }

    public function conceitos(){
        return view("principais.conceitos");
    }
}
