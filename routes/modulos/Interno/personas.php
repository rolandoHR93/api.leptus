<?php

use App\Http\Controllers\Interno\Personas\PersonasController;
use Illuminate\Support\Facades\Route;

Route::get("lista/{key}", [PersonasController::class, 'lista']);
Route::post("create/{key}",  [PersonasController::class, 'create']);
Route::put("update/{key}/{id}",  [PersonasController::class, 'update']);
Route::delete("delete/{key}/{id}",  [PersonasController::class, 'delete']);