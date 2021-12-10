<?php

use App\Http\Controllers\Interno\Roles\RolesController;
use Illuminate\Support\Facades\Route;

Route::get("lista/{key}",  [RolesController::class, 'lista']);
Route::post("create/{key}",  [RolesController::class, 'create']);
Route::put("update/{key}/{id}",  [RolesController::class, 'update']);
Route::delete("delete/{key}/{id}",  [RolesController::class, 'delete']);
