<?php

use App\Http\Controllers\Interno\Items\ItemsController;
use Illuminate\Support\Facades\Route;

Route::get("lista/{key}",  [ItemsController::class, 'lista']);
Route::post("create/{key}",  [ItemsController::class, 'create']);
Route::put("update/{key}/{id}",  [ItemsController::class, 'update']);
Route::delete("delete/{key}/{id}",  [ItemsController::class, 'delete']);