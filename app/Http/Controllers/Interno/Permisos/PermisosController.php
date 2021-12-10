<?php

namespace App\Http\Controllers\Permisos;

use App\Http\Controllers\Controller;
use App\Repositories\PermisosRepository;
use Illuminate\Http\Request;

class PermisosController extends Controller
{
    protected $repository;

    public function __construct(PermisosRepository $repository)
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
