<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Repositories\AuthRepository;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;

class AuthController extends Controller
{

    protected $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->middleware('verifyApiCode');
        $this->authRepository = $authRepository;
    }

	public function register(Request $request, $key){

		try {

			$validateData = $request->validate([
				'nombres' => 'required|string|max:255',
				'email' => 'required|string|email|max:255|unique:users',
				'password' => 'required|string|min:6',
			]);

            $respuesta = $this->authRepository->register($request->all());

			// ** Crear Token de acceso Personal para el usuario
			$token = $respuesta->createToken('auth_token')->plainTextToken;

			return response()->json([
				'access_token' => $token,
				'token_type' => 'Bearer',
			]);

		} catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}

	}

	public function login(Request $request, $key){


		try {
            if(!Auth::attempt($request->only('email', 'password'))){
                return response()->json([
                    'message' => 'Invalid login details'
                ], 401);
            }

            $respuesta = $this->authRepository->login($request);

			$token = $respuesta->createToken('auth_token')->plainTextToken;

			return response()->json([
				'access_token' => $token,
				'token_type' => 'Bearer',
                'user' => $respuesta
			]);
		}catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
	}

    public function userinfo(Request $request){
		try {
			return $request->user();
		}catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
	}

    // this method signs out users by removing tokens
    public function signout()
    {
        try {

            $respuesta =  $this->authRepository->signout();

            return $respuesta;
        }catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
