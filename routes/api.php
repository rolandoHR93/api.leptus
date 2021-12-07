<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/', function(){
	return response()->json('--- Bienvenido  👍 ---', 200);
});

Route::prefix('auth')
	->group(base_path('routes/modulos/authRoute.php'));

Route::prefix('usuarios')
	->group(base_path('routes/modulos/usuario.php'));


Route::prefix('roles')
	->group(base_path('routes/modulos/roles.php'));

Route::prefix('permisos')
	->group(base_path('routes/modulos/permisosSoftware.php'));


Route::prefix('serviciosSoftware')
	->group(base_path('routes/modulos/grupoServicio.php'));

Route::prefix('facturacionSoftware')
	->group(base_path('routes/modulos/facturacionSoftware.php'));

Route::prefix('clientesAdministrador')
	->group(base_path('routes/modulos/clientesAdministrador.php'));
