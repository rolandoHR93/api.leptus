<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\src\Repositories\Interno\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Exception;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('verifyApiCode');
        $this->userRepository = $userRepository;
    }

	public function lista($key){
		try {
            $usuarios =  $this->userRepository->lista(1);
			return response()->json(['data' => $usuarios]);
		}
		catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
	}

	public function create(Request $request, $key){
        try {
            $usuarios = $this->userRepository->create($request);

			return response()->json(['data' => $usuarios], 200);
		}
		catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
    }

    public function update(Request $request, $key, $id){
        try {

            $usuarios = $this->userRepository->update($request, $id);

			return response()->json(['data' => $usuarios], 200);
		}
		catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
    }

    public function delete($key, $id){
        try {

            $usuarios = $this->userRepository->delete($id);

			return response()->json(['data' => $usuarios], 200);
		}
		catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
    }
}
