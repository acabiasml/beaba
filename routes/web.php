<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.main');
});

Route::get('/login', [UserController::class, 'logar'])->name('paglogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/auth', [UserController::class, 'autenticar'])->name('pagauth');
Route::get('/dash', [DashboardController::class,'dash'])->name('dash');