<?php

namespace App\Http\Controllers;
use \App\Tables\UsersTable;
use \App\Tables\EscolasTable;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home(){
        return view("principais.home");
    }

    public function biblioteca(){
        return view("principais.biblioteca");
    }

    public function escolas(Request $request){
        $table = (new EscolasTable($request))->setup();
        return view("principais.escolas", compact("table"));
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
