<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/', function(){
	return response()->json('--- Bienvenido al API 👍 ---', 200);
});

Route::prefix('usuarios')
	->group(base_path('routes/modulos/usuario.php'));

Route::prefix('serviciosSofware')
	->group(base_path('routes/modulos/grupoServicio.php'));
