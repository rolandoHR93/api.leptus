<?php

use App\Http\Controllers\Interno\Modulos\ModulosController;
use Illuminate\Support\Facades\Route;

// http://127.0.0.1:8000/api/modulos/
//----------------

//CRUD MODULOS
Route::get("lista/{key}",  [ModulosController::class, 'lista']);
Route::post("create/{key}",  [ModulosController::class, 'create']);
Route::put("update/{key}/{id}",  [ModulosController::class, 'update']);
Route::delete("delete/{key}/{id}",  [ModulosController::class, 'delete']);

//RELACION MODULOS-ITEMACCESO
Route::post("agregarModuloItem/{key}",  [ModulosController::class, 'agregarModuloItem']);
Route::delete("deleteModuloItem/{key}",  [ModulosController::class, 'deleteModuloItem']);

//RELACION MODULOS-PERSONA
Route::post("agregarModuloPersona/{key}",  [ModulosController::class, 'agregarModuloPersona']);
Route::delete("deleteModuloPersona/{key}",  [ModulosController::class, 'deleteModuloPersona']);
