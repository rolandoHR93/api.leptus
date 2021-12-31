<?php

use App\Http\Controllers\Interno\Ubigeos\UbigeosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// http://127.0.0.1:8000/api/ubigeos/
// --------------

Route::get("/lista/{key}", [UbigeosController::class, 'lista']);
