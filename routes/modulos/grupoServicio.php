<?php

use App\Http\Controllers\GrupoServicios\GrupoServiciosController;
use Illuminate\Support\Facades\Route;


Route::get("/lista/{meses?}/{key}",  [GrupoServiciosController::class, 'lista']);
