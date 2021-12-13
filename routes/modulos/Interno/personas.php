<?php

use App\Http\Controllers\Interno\Personas\PersonasController;
use Illuminate\Support\Facades\Route;

Route::get('lista/{key}', [PersonasController::class, 'lista']);