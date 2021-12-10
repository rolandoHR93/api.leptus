<?php

namespace App\Http\Controllers\Interno\Roles;

use App\Http\Controllers\Controller;
use App\Repositories\RolesRepository;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Exception;

class RolesController extends Controller
{
    protected $repository;

    public function __construct(RolesRepository $repository)
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
