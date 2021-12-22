<?php

namespace App\Http\Controllers\Interno\Modulos;

use App\Http\Controllers\Controller;
use App\src\Repositories\Interno\ModulosRepository;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ModulosController extends Controller
{
    protected $repository;

    public function __construct(ModulosRepository $repository)
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

    public function agregarModuloItem(Request $request, $key)
    {
        try {
            $respuesta = $this->repository->agregarModuloItem($request);

			return response()->json(['data' => $respuesta], 200);

        } catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
    }

    public function deleteModuloItem(Request $request, $key){
        try {

            $respuesta = $this->repository->deleteModuloItem($request);

			return response()->json(['data' => $respuesta], 200);
		}
		catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
    }

    public function agregarModuloPersona(Request $request, $key){
        try {

        } catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
    }

    public function deleteModuloPersona(Request $request, $key){
        try {

        } catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
    }

}
