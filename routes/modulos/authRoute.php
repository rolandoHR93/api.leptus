<?php

use App\Http\Controllers\Users\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post("/register",  [AuthController::class, 'register']);
Route::post("/login",     [AuthController::class, 'login']);

//using middleware
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
    Route::post("/userinfo",  [AuthController::class, 'userinfo']);

    Route::post('/sign-out', [AuthController::class, 'signout']);
});
