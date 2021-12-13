<?php

use App\Http\Controllers\Users\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// http://127.0.0.1:8000/api/usuarios/
// --------------

// Route::post("/userinfo",  [AuthController::class, 'userinfo'])->middleware('auth:sanctum');


Route::get('/', function(){
	return response()->json('--- Usuarios ---', 200);
});


Route::get("/lista/{key}",      [UserController::class, 'lista']);


