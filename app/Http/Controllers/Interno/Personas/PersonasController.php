<?php

namespace App\Http\Controllers\Interno\Personas;

use App\Repositories\PersonasRepository;
use App\Http\Controllers\Controller;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class PersonasController extends Controller
{
    protected $repository;

    public function __construct(PersonasRepository $repository)
    {
        $this->middleware('verifyApiCode');
        $this->repository = $repository;
    }

    public function lista($key)
    {
        try {

            $respuesta = $this->repository->lista();

			return response()->json(['data' => $respuesta], 200);
		}
		catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
    }
}
