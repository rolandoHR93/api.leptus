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

// ================================================
// **************** MODULOS INTERNOS ****************
// ================================================

Route::prefix('auth')
	->group(base_path('routes/modulos/Interno/authRoute.php'));

Route::prefix('usuarios')
	->group(base_path('routes/modulos/Interno/usuario.php'));


Route::prefix('roles')
	->group(base_path('routes/modulos/Interno/roles.php'));

Route::prefix('permisos')
	->group(base_path('routes/modulos/Interno/permisosSoftware.php'));


Route::prefix('serviciosSoftware')
	->group(base_path('routes/modulos/Interno/grupoServicio.php'));

Route::prefix('facturacionSoftware')
	->group(base_path('routes/modulos/Interno/facturacionSoftware.php'));


// ================================================
// **************** MODULOS EXTERNOS ****************
// ================================================
Route::prefix('clientesAdministrador')
	->group(base_path('routes/modulos/externo/clientesAdministrador.php'));

