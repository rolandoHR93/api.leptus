<?php

use App\Http\Controllers\Interno\GrupoServicios\GrupoServiciosController;
use App\Http\Controllers\Interno\ServiciosSoftware\ServiciosSoftwareController;
use Illuminate\Support\Facades\Route;



Route::get("/lista/{key}",  [GrupoServiciosController::class, 'lista']);


Route::get("Servicioslista/{key}",  [ServiciosSoftwareController::class, 'lista']);
Route::post("servicioStore/{key}",  [ServiciosSoftwareController::class, 'store']);
Route::put("servicioUpdate/{key}/{id}",  [ServiciosSoftwareController::class, 'update']);
Route::delete("servicioDelete/{key}/{id}",  [ServiciosSoftwareController::class, 'delete']);
