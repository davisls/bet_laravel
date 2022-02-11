<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApostaController;

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

Route::get('/', [HomeController::class, ('index')]);

Route::get('/aposta_cinquenta', [ApostaController::class, ('cinquenta')])->middleware('auth');
Route::post('/aposta/cinquenta', [ApostaController::class, ('aposta')])->middleware('auth');
Route::get('/aposta_vinte', [ApostaController::class, ('vinte')])->middleware('auth');
Route::post('/aposta/vinte', [ApostaController::class, ('aposta')])->middleware('auth');
Route::get('/aposta_dez', [ApostaController::class, ('dez')])->middleware('auth');
Route::post('/aposta/dez', [ApostaController::class, ('aposta')])->middleware('auth');
Route::get('/aposta_um', [ApostaController::class, ('um')])->middleware('auth');
Route::post('/aposta/um', [ApostaController::class, ('aposta')])->middleware('auth');
Route::get('/dashboard', [ApostaController::class, ('dashboard')])->middleware('auth');
