<?php

namespace App\Http\Controllers\Interno\Empresa;

use App\Http\Controllers\Controller;
use App\src\Repositories\Interno\EmpresaRepository;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Exception;

class EmpresaController extends Controller
{
    protected $repository;

    public function __construct(EmpresaRepository $repository)
    {
        $this->middleware('verifyApiCode');
        $this->repository = $repository;
    }

    public function lista($key)
    {
        try{
            $respuesta = $this->repository->lista(1);
            return response()->json([
				'data' => $respuesta,
			], 200);
        }catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
    }
}
