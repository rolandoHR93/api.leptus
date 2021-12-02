<?php

use App\Http\Controllers\Users\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::post("/register/{key}",  [AuthController::class, 'register']);
Route::post("/login/{key}",     [AuthController::class, 'login']);

//using middleware
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
    Route::post("/userinfo",  [AuthController::class, 'userinfo']);

    Route::post('/sign-out', [AuthController::class, 'signout']);
});
