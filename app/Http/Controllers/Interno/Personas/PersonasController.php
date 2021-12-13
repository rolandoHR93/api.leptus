<?php

namespace App\Http\Controllers\Interno\Personas;


use App\Http\Controllers\Controller;
use App\Repositories\Interno\PersonasRepository;
use Exception;
use Illuminate\Http\Request;
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

    public function create(Request $request, $key){
        try {
            $respuesta = $this->repository->create($request);

			return response()->json(['data' => $respuesta], 200);
		}
		catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
    }

    public function update(Request $request, $key, $id){
        try {

            $respuesta = $this->repository->update($request, $id);

			return response()->json(['data' => $respuesta], 200);
		}
		catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
    }
    public function delete($key, $id){
        try {

            $respuesta = $this->repository->delete($id);

			return response()->json(['data' => $respuesta], 200);
		}
		catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
    }
}
