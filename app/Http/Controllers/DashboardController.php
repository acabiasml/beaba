<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function pessoas(){
        return view("principais.pessoas");
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
