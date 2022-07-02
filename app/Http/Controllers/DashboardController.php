<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home(){
        return view("home");
    }

    public function biblioteca(){
        return view("biblioteca");
    }

    public function escola(){
        return view("escola");
    }

    public function pessoas(){
        return view("pessoas");
    }

    public function diarios(){
        return view("diarios");
    }

    public function relatorios(){
        return view("relatorios");
    }

    public function turmas(){
        return view("turmas");
    }

    public function conceitos(){
        return view("conceitos");
    }
}
