<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EscolaController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\ComponenteController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\DiarioController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\FrequenciaController;

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

    Route::get('/pessoas', [DashboardController::class,'pessoas'])->name('pessoas');
    Route::get('/createuser', [UserController::class, 'create'])->name('user.create');
    Route::get('/showuser/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/edituser/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::get('/printuser/{id}', [UserController::class, 'print'])->name('user.print');
    Route::delete('/destroyuser/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::post('/inclui', [UserController::class, 'storeUser'])->name('user.store.user');
    Route::post('/atualiza', [UserController::class, 'update'])->name('user.update.user');

    Route::get('/escolas', [DashboardController::class,'escolas'])->name('escolas');
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

    Route::get('/periodos/{id}', [PeriodoController::class, 'index'])->name('periodos');
    Route::get('/createperiodo/{id}', [PeriodoController::class, 'create'])->name('periodo.create');
    Route::get('/editperiodo/{id}', [PeriodoController::class, 'edit'])->name('periodo.edit');
    Route::delete('/destroyperiodo/{id}', [PeriodoController::class, 'destroy'])->name('periodo.destroy');
    Route::post('/incluiperiodo', [PeriodoController::class, 'store'])->name('periodo.store');
    Route::post('/atualizaperiodo', [PeriodoController::class, 'update'])->name('periodo.update');

    Route::get('/cursos/{id}', [CursoController::class, 'index'])->name('cursos');
    Route::get('/createcurso/{id}', [CursoController::class, 'create'])->name('curso.create');
    Route::get('/editcurso/{id}', [CursoController::class, 'edit'])->name('curso.edit');
    Route::delete('/destroycurso/{id}', [CursoController::class, 'destroy'])->name('curso.destroy');
    Route::post('/incluicurso', [CursoController::class, 'store'])->name('curso.store');
    Route::post('/atualizacurso', [CursoController::class, 'update'])->name('curso.update');

    Route::get('/componentes/{id}', [ComponenteController::class, 'index'])->name('componentes');
    Route::get('/createcomponente/{id}', [ComponenteController::class, 'create'])->name('componente.create');
    Route::get('/editcomponente/{id}', [ComponenteController::class, 'edit'])->name('componente.edit');
    Route::delete('/destroycomponente/{id}', [ComponenteController::class, 'destroy'])->name('componente.destroy');
    Route::post('/incluicomponente', [ComponenteController::class, 'store'])->name('componente.store');
    Route::post('/atualizacomponente', [ComponenteController::class, 'update'])->name('componente.update');

    Route::get('/turmas/{id}', [TurmaController::class, 'index'])->name('turmas');
    Route::get('/createturma/{id}', [TurmaController::class, 'create'])->name('turma.create');
    Route::get('/editturma/{id}', [TurmaController::class, 'edit'])->name('turma.edit');
    Route::post('/destroyturma', [TurmaController::class, 'destroy'])->name('turma.destroy');
    Route::post('/incluiturma', [TurmaController::class, 'store'])->name('turma.store');
    Route::post('/atualizaturma', [TurmaController::class, 'update'])->name('turma.update');

    Route::get('/diarios', [DiarioController::class,'index'])->name('diarios');
    Route::get('/verdiario', [DiarioController::class,'ver'])->name('diario.ver');
    Route::get('/incluiconteudo', [DiarioController::class, 'store'])->name('diario.store');
    Route::post('/destroyconteudo', [DiarioController::class, 'destroy'])->name('diario.destroy');
    Route::get('/printdiario', [DiarioController::class, 'print'])->name('diario.print');

    Route::get('/medias/', [MediaController::class,'index'])->name('medias');
    Route::get('/incluimedia', [MediaController::class,'store'])->name('media.store');

    Route::post('/frequencias', [FrequenciaController::class,'index'])->name('frequencias');
    Route::get('/verfrequencia', [FrequenciaController::class,'index'])->name('frequencia.ver');
    Route::post('/atualizafrequencia', [FrequenciaController::class, 'update'])->name('frequencia.update');

    Route::get('/relatorios', [RelatorioController::class,'index'])->name('relatorios');
    Route::get('/seleciona', [RelatorioController::class,'select'])->name('frequencia.ver');
});
