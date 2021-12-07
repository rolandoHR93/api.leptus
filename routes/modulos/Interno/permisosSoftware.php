<?php

use App\Http\Controllers\Permisos\PermisosController;
use Illuminate\Support\Facades\Route;

Route::get("lista/{key}",  [PermisosController::class, 'lista']);
Route::post("store/{key}",  [PermisosController::class, 'store']);
Route::put("update/{key}/{id}",  [PermisosController::class, 'update']);
Route::delete("delete/{key}/{id}",  [PermisosController::class, 'delete']);
