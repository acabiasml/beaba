<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    #return view('layouts.main');
    if (Auth::check()){
        return redirect('home');
    }else{
        return view("paglogin");
    }
});

//Tentativa de abrir página de login. Se estiver logado, vai pra home.
Route::get('/login', function(){
    if (Auth::check()){
        return redirect('home');
    }else{
        return view("paglogin");
    }
})->name('login');

//Rota para realizar autenticação.
Route::post('/auth', [UserController::class, 'autenticar'])->name('auth');
Route::get('/auth', function(){return redirect('login');});

//Grupo que só se acessa se estiver logado.
Route::group(['middleware' => 'auth'], function(){
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/home', [DashboardController::class,'home'])->name('home');
    Route::get('/biblioteca', [DashboardController::class,'biblioteca'])->name('biblioteca');
    Route::get('/escola', [DashboardController::class,'escola'])->name('escola');
    Route::get('/pessoas', [DashboardController::class,'pessoas'])->name('pessoas');
    Route::get('/diarios', [DashboardController::class,'diarios'])->name('diarios');
    Route::get('/relatorios', [DashboardController::class,'relatorios'])->name('relatorios');
    Route::get('/turmas', [DashboardController::class,'turmas'])->name('turmas');
    Route::get('/conceitos', [DashboardController::class,'conceitos'])->name('conceitos');
});
