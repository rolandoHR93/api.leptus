<?php

namespace App\Http\Controllers\Interno\Ubigeos;

use App\Http\Controllers\Controller;
use App\src\Repositories\Interno\UbigeoRepository;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Exception;

class UbigeosController extends Controller
{
    protected $repository;

    public function __construct(UbigeoRepository $repository)
    {
        $this->middleware('verifyApiCode');
        $this->repository = $repository;
    }


    public function lista($key)
    {
        try {

            $respuesta = $this->repository->lista(1);

			return response()->json(['data' => $respuesta], 200);
		}
		catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
    }

    public function getProvincia($key, $departamentoID)
    {
        try{
            // exec  [Listar].[Provincia] '15'
            $respuesta = $this->repository->getProvincias($departamentoID);
			return response()->json(['data' => $respuesta], 200);
        }
		catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
    }

    public function getDistritos($key, $departamentoID, $provinciaID)
    {
        try{
            $respuesta = $this->repository->getDistritos($departamentoID, $provinciaID);
			return response()->json(['data' => $respuesta], 200);
        }
		catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
    }
}
