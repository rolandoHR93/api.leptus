<?php

use App\Http\Controllers\Users\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::post("/register/{key}",  [AuthController::class, 'register']);
Route::post("/login/{key}",     [AuthController::class, 'login']);
Route::get("/loginSE2/{key}",   [AuthController::class, 'loginSE']);


Route::get('/loginSE/{key}', function(){
    return view('auth.index');
});

Route::post("/appRefresh/{key}",   [AuthController::class, 'loginSE']);

//using middleware
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
    Route::post("/userinfo",  [AuthController::class, 'userinfo']);

    Route::post('/sign-out', [AuthController::class, 'signout']);
});
