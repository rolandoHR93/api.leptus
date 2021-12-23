<?php

use App\Http\Controllers\GrupoServicios\FacturacionSoftwareController;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){
	return response()->json('--- Administrador ---', 200);
});
