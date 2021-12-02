<?php

use App\Http\Controllers\ServiciosSoftware\ServiciosSoftwareController;
use App\Http\Controllers\GrupoServicios\GrupoServiciosController;
use Illuminate\Support\Facades\Route;


Route::get("/lista/{key}/{meses?}",  [GrupoServiciosController::class, 'lista']);


Route::get("/lista/{key}",  [ServiciosSoftwareController::class, 'lista']);
