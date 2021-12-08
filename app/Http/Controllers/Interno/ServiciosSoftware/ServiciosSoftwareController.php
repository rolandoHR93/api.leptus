<?php

namespace App\Http\Controllers\Interno\ServiciosSoftware;

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

    public function lista($key){

		try {
            $resultados = $this->repository->lista();

			return response()->json(['data' => $resultados], 200);
		}
		catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
	}

    public function store(Request $request)
    {
		try {
            $resultados = $this->repository->createServicio($request);

		    return response()->json(['data' => $resultados], 201);
        }
        catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function update(Request $request, $key, $id)
	{
		try {
            $resultados = $this->repository->updateServicio($request, $id);

            return response()->json(['data' => $resultados], 200);
        }
        catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
	}

	public function delete($key, $id)
	{
		try {
            $resultados = $this->repository->deleteServicio( $id);

			return response()->json(
                $resultados
            , 200);

		} catch (\Throwable $th) {
			//throw $th;
            return response()->json(["error" => $th->getMessage()], Response::HTTP_BAD_REQUEST);
		}
	}

}
