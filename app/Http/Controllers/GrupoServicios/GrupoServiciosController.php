<?php

namespace App\Http\Controllers\GrupoServicios;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\GrupoServicios;
use Exception;

class GrupoServiciosController extends Controller
{
    public function lista(){
		try {
            $resultados = GrupoServicios::all();
			return response()->json($resultados);
		}
		catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
	}
}
