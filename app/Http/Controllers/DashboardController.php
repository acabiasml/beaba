<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Aviso;
use \App\Tables\UsersTable;
use \App\Tables\EscolasTable;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        $aniversariantes = User::get();
        $avisos = Aviso::get();
        return view("principais.home", ['aniversariantes' => $aniversariantes, "avisos" => $avisos]);
    }

    public function biblioteca()
    {
        return view("biblioteca.index");
    }

    public function escolas(Request $request)
    {
        $table = (new EscolasTable($request))->setup();
        return view("escola.index", compact("table"));
    }

    public function pessoas(Request $request)
    {
        $table = (new UsersTable($request))->setup();
        return view("user.index", compact("table"));
    }

}
