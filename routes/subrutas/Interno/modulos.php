<?php

use App\Http\Controllers\Interno\Modulos\ModulosController;
use Illuminate\Support\Facades\Route;

// http://127.0.0.1:8000/api/modulos/
//----------------

Route::get("lista/{key}",  [ModulosController::class, 'lista']);
Route::post("create/{key}",  [ModulosController::class, 'create']);
Route::put("update/{key}/{id}",  [ModulosController::class, 'update']);
Route::delete("delete/{key}/{id}",  [ModulosController::class, 'delete']);


Route::post("moduloItem/{key}",  [ModulosController::class, 'moduloItem']);
