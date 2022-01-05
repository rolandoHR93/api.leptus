<?php

namespace App\Http\Controllers\Interno\Personas;


use App\Http\Controllers\Controller;
use App\src\Repositories\Interno\PersonasRepository;
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

    public function agregarPersonaUser(Request $request, $key)
    {
        try {
            $respuesta = $this->repository->agregarPersonaUser($request);

			return response()->json(['data' => $respuesta], 200);

        } catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
    }

    public function deletePersonaUser(Request $request, $key){
        try {

            $respuesta = $this->repository->deletePersonaUser($request);

			return response()->json(['data' => $respuesta], 200);
		}
		catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
    }

    public function listaPersonaModulos($key,Request $request)
    {
        //dd($request->route()->parameters());
        // dd($request->route('key'));
        // dd(request('key'));
        try {
            // $request->id_persona = $request->id_persona ?? 1;
            if (isset($request->id_persona)){
                $respuesta = $this->repository->listaPersonaModulos($request->id_persona);
			    return response()->json(['data' => $respuesta], 200);
            }
			return response()->json(['error' => 'not found'], 404);

		}
		catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
    }
}
