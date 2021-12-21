<?php

namespace App\Http\Controllers\Interno\GrupoServicios;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\src\Repositories\Interno\GrupoServiciosRepository;
use Illuminate\Http\Request;
use App\Models\GrupoServicios;
use Exception;

class GrupoServiciosController extends Controller
{
    protected $grupoRepository;

    public function __construct(GrupoServiciosRepository $grupoRepository)
    {
        $this->middleware('verifyApiCode');
        $this->grupoRepository = $grupoRepository;
    }

    public function lista($key,  $meses=1){

		try {
            $resultados = $this->grupoRepository->lista($meses);
			return response()->json(['data' => $resultados]);
		}
		catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
	}

}
