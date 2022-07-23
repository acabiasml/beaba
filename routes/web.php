<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

Route::post('/incluir', [UserController::class, 'storeFirst'])->name('user.store.first');

Route::get('/', function () {
    if(User::count() == 0){
        return view("instalacao.passo1");
    }

    if (Auth::check()){
        return redirect('home');
    }else{
        return view("paglogin");
    }
});

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

    Route::get('/createuser', [UserController::class, 'create'])->name('user.create');
    Route::get('/showuser/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/edituser/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::get('/destroyuser/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});
