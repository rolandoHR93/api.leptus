<?php

namespace App\Http\Controllers\ServiciosSoftware;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\GrupoServiciosRepository;
use Illuminate\Http\Request;
use Exception;

class ServiciosSoftwareController extends Controller
{

    protected $repository;

    public function __construct(GrupoServiciosRepository $grupoRepository)
    {
        // $this->repository = $grupoRepository;
    }

    public function lista(string $key){

        if($key != env('API_KEY_ACCESS'))
                abort(404);
		try {
            // $resultados = $this->grupoRepository->lista($meses);

			return response()->json('caso');
		}
		catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
	}
}
