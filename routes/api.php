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
    return view('welcome');
	// return response()->json('--- Bienvenido  👍 ---', 200);
});

// ================================================
// **************** MODULOS INTERNOS ****************
// ================================================

Route::prefix('auth')
	->group(base_path('routes/subrutas/Interno/authRoute.php'));

Route::prefix('usuarios')
	->group(base_path('routes/subrutas/Interno/usuario.php'));


Route::prefix('roles')
	->group(base_path('routes/subrutas/Interno/roles.php'));

Route::prefix('permisos')
	->group(base_path('routes/subrutas/Interno/permisosSoftware.php'));


Route::prefix('grupoServiciosSoftware')
	->group(base_path('routes/subrutas/Interno/grupoServicio.php'));

Route::prefix('facturacionSoftware')
	->group(base_path('routes/subrutas/Interno/facturacionSoftware.php'));

Route::prefix('personas')
	->group(base_path('routes/subrutas/Interno/personas.php'));

Route::prefix('items')
	->group(base_path('routes/subrutas/Interno/items.php'));

Route::prefix('modulos')
	->group(base_path('routes/subrutas/Interno/modulos.php'));

// ================================================
// **************** MODULOS EXTERNOS ****************
// ================================================
Route::prefix('clientesAdministrador')
	->group(base_path('routes/subrutas/externo/clientesAdministrador.php'));

