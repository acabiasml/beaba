<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EscolaController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\BimestreController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DashboardController;

Route::post('/incluir', [UserController::class, 'storeFirst'])->name('user.store.first');

Route::get('/', function () {
    if(User::count() == 0){
        return view("instalacao.passo1");
    }

    if (Auth::check()){
        return redirect('home');
    }else{
        return view("principais.login");
    }
});

Route::get('/login', function(){
    if (Auth::check()){
        return redirect('home');
    }else{
        return view("principais.login");
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
    Route::get('/escolas', [DashboardController::class,'escolas'])->name('escolas');
    Route::get('/pessoas', [DashboardController::class,'pessoas'])->name('pessoas');
    Route::get('/diarios', [DashboardController::class,'diarios'])->name('diarios');
    Route::get('/relatorios', [DashboardController::class,'relatorios'])->name('relatorios');
    Route::get('/turmas', [DashboardController::class,'turmas'])->name('turmas');
    Route::get('/conceitos', [DashboardController::class,'conceitos'])->name('conceitos');

    Route::get('/createuser', [UserController::class, 'create'])->name('user.create');
    Route::get('/showuser/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/edituser/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::get('/printuser/{id}', [UserController::class, 'print'])->name('user.print');
    Route::delete('/destroyuser/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::post('/inclui', [UserController::class, 'storeUser'])->name('user.store.user');
    Route::post('/atualiza', [UserController::class, 'update'])->name('user.update.user');

    Route::get('/createescola', [EscolaController::class, 'create'])->name('escola.create');
    Route::get('/showescola/{id}', [EscolaController::class, 'show'])->name('escola.show');
    Route::get('/editescola/{id}', [EscolaController::class, 'edit'])->name('escola.edit');
    Route::get('/printescola/{id}', [EscolaController::class, 'print'])->name('escola.print');
    Route::delete('/destroyescola/{id}', [EscolaController::class, 'destroy'])->name('escola.destroy');
    Route::post('/incluiescola', [EscolaController::class, 'storeEscola'])->name('escola.store.escola');
    Route::post('/atualizaescola', [EscolaController::class, 'update'])->name('escola.update.escola');

    Route::get('/calendarios/{id}', [CalendarioController::class, 'index'])->name('calendarios');
    Route::get('/createcalendario/{id}', [CalendarioController::class, 'create'])->name('calendario.create');
    Route::get('/editcalendario/{id}', [CalendarioController::class, 'edit'])->name('calendario.edit');
    Route::delete('/destroycalendario/{id}', [CalendarioController::class, 'destroy'])->name('calendario.destroy');
    Route::post('/incluicalendario', [CalendarioController::class, 'store'])->name('calendario.store');
    Route::post('/atualizacalendario', [CalendarioController::class, 'update'])->name('calendario.update');

    Route::get('/bimestres/{id}', [BimestreController::class, 'index'])->name('bimestres');
    Route::get('/createbimestre/{id}', [BimestreController::class, 'create'])->name('bimestre.create');
    Route::get('/editbimestre/{id}', [BimestreController::class, 'edit'])->name('bimestre.edit');
    Route::delete('/destroybimestre/{id}', [BimestreController::class, 'destroy'])->name('bimestre.destroy');
    Route::post('/incluibimestre', [BimestreController::class, 'store'])->name('bimestre.store');
    Route::post('/atualizabimestre', [BimestreController::class, 'update'])->name('bimestre.update');

    Route::get('/cursos/{id}', [CursoController::class, 'index'])->name('cursos');
});
