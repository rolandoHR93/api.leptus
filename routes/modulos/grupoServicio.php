<?php

use App\Http\Controllers\GrupoServicios\GrupoServiciosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get("/lista",  [GrupoServiciosController::class, 'lista']);
