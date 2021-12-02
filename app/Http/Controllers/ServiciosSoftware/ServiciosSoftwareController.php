<?php

namespace App\Http\Controllers\ServiciosSoftware;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\ServiciosRepository;
use Illuminate\Http\Request;
use Exception;

class ServiciosSoftwareController extends Controller
{

    protected $repository;

    public function __construct(ServiciosRepository $repository)
    {
        $this->middleware('verifyApiCode');
        $this->repository = $repository;
    }

    public function lista(string $key){

		try {
            $resultados = $this->repository->lista();

			return response()->json($resultados);
		}
		catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
	}
}
