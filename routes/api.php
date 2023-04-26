<?php

use App\Http\Controllers\EquipoController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login',[UsuarioController::class,'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::resource('jugador',JugadorController::class);
    Route::resource('equipo',EquipoController::class);
    Route::resource('user',UsuarioController::class);
});

