<?php

namespace App\Http\Controllers;

use App\Models\User;
use \App\Tables\UsersTable;
use \App\Tables\EscolasTable;
use Illuminate\Support\Facades\View;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        return view("principais.home");
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

    public function relatorios()
    {
        $professores = User::where('tipo', '!=' ,'estud')->get();
        return View::make("principais.relatorios")->with("professores", $professores);
    }
}
