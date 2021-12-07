<?php

use App\Http\Controllers\Roles\RolesController;
use Illuminate\Support\Facades\Route;

Route::get("lista/{key}",  [RolesController::class, 'lista']);
Route::post("store/{key}",  [RolesController::class, 'store']);
Route::put("update/{key}/{id}",  [RolesController::class, 'update']);
Route::delete("delete/{key}/{id}",  [RolesController::class, 'delete']);
