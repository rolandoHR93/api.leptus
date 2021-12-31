<?php

namespace App\Http\Controllers\Interno\Ubigeos;

use App\Http\Controllers\Controller;
use App\src\Repositories\Interno\UbigeoRepository;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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
}
