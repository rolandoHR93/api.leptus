<?php

use App\Http\Controllers\Interno\ForgotPassword\ForgotPasswordController;
use App\Http\Controllers\Users\AuthController;
use App\Http\Controllers\Config\AppController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// http://127.0.0.1:8000/api/auth/
//----------------

Route::get("/getRegisterHome/{key}",  [AuthController::class, 'getRegisterHome']);
Route::post("/register/{key}",  [AuthController::class, 'register']);
Route::post("/login/{key}",     [AuthController::class, 'login']);
Route::post("/activate-account",     [AuthController::class, 'activateAccount']);
Route::post("/forgot-password/{key}",     [ForgotPasswordController::class, 'forgotPassword']);
Route::post("/reset-password/{key}",     [ForgotPasswordController::class, 'changePassword']);


Route::get('/loginSE/{key}', function(){   return view('auth.index'); });
Route::post("/backRefresh/{key}",   [AppController::class, 'backRefresh']);

//using middleware
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
    Route::post("/userinfo",  [AuthController::class, 'userinfo']);

    Route::post('/sign-out', [AuthController::class, 'signout']);
});



