<?php

use App\Http\Controllers\Users\AuthController;
use App\Http\Controllers\Users\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post("/register",  [AuthController::class, 'register']);
Route::post("/login",     [AuthController::class, 'login']);
Route::post("/userinfo",  [AuthController::class, 'userinfo'])->middleware('auth:sanctum');

Route::get("/lista",      [UserController::class, 'lista']);
