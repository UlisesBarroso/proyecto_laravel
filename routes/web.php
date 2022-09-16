<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CasillaController;
use App\Http\Controllers\rolController;



Route::get('/', function () {
    return view('welcome');
});
Route::resource('casilla', CasillaController::class);
Route::resource("candidato", CandidatoController::class);
Route::resource('rol', rolController::class);
