<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Mail\Auth\ActivarCuentaUsuarioMail;
use App\src\Repositories\Interno\PersonasRepository;
use App\src\Repositories\Emails\AlertRepository;
use App\src\Repositories\Interno\AuthRepository;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;

class AuthController extends Controller
{

    protected $authRepository;
    protected $emailAlertRepository;
    protected $personRepository;

    public function __construct(AuthRepository $authRepository
                        , AlertRepository $emailAlertRepository
                        , PersonasRepository $personRepository)
    {
        $this->middleware('verifyApiCode');
        $this->authRepository = $authRepository;
        $this->emailAlertRepository = $emailAlertRepository;
        $this->personRepository = $personRepository;
    }

	public function register(Request $request, $key){

		try {

			$validateData = $request->validate([
				'nombres' => 'required|string|max:255',
				'email' => 'required|string|email|max:255|unique:users',
				'password' => 'required|string|min:6',
			]);

            $respuesta = $this->authRepository->register($request->all());
            $persona = $this->personRepository->create($request);

            $request->id_user = $respuesta->id;
            $request->id_persona = $persona->id;
            $this->personRepository->agregarPersonaUser($request);

            // Enviar Correo
            $this->emailAlertRepository->usuarioRegistrado($request);

			// ** Crear Token de acceso Personal para el usuario
			$token = $respuesta->createToken('auth_token')->plainTextToken;

			return response()->json([
				'access_token' => $token,
				'token_type' => 'Bearer',
				'user' => $respuesta
			]);

		} catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}

	}

	public function login(Request $request, $key){


		try {
            if(!Auth::attempt($request->only('email', 'password'))){
                return response()->json([
                    'message' => 'Detalles Login Invalidos'
                ], 404);
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
