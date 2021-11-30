<?php

use App\Http\Controllers\Users\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::post("/userinfo",  [AuthController::class, 'userinfo'])->middleware('auth:sanctum');

Route::get("/lista",      [UserController::class, 'lista']);
