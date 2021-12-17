<?php

use App\Http\Controllers\Interno\Permisos\PermisosController;
use Illuminate\Support\Facades\Route;

// http://127.0.0.1:8000/api/permisos/
//----------------

Route::get("lista/{key}",  [PermisosController::class, 'lista']);
Route::post("create/{key}",  [PermisosController::class, 'create']);
Route::put("update/{key}/{id}",  [PermisosController::class, 'update']);
Route::delete("delete/{key}/{id}",  [PermisosController::class, 'delete']);
