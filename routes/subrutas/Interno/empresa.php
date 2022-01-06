<?php

use App\Http\Controllers\Interno\Empresa\EmpresaController;
use App\Http\Controllers\Interno\Items\ItemsController;
use Illuminate\Support\Facades\Route;

Route::get("lista/{key}",  [EmpresaController::class, 'lista']);
