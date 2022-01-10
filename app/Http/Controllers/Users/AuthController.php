<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Mail\Auth\ActivarCuentaUsuarioMail;
use App\src\Repositories\Emails\ActivateAccountRepository;
use App\src\Repositories\Interno\PersonasRepository;
use App\src\Repositories\Interno\AuthRepository;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Exception;

class AuthController extends Controller
{

    protected $authRepository;
    protected $_emailAlertRepository;
    protected $personRepository;

    public function __construct(AuthRepository $authRepository
                        , ActivateAccountRepository $emailAlertRepository
                        , PersonasRepository $personRepository)
    {
        $this->middleware('verifyApiCode');
        $this->authRepository = $authRepository;
        $this->_emailAlertRepository = $emailAlertRepository;
        $this->personRepository = $personRepository;
    }

	public function register(Request $request, $key){

		try {

			// $validateData = $request->validate([
			// 	'nombres' => 'required|string|max:255',
			// 	'email' => 'required|string|email|max:255|unique:users',
			// 	'password' => 'required|string|min:6',
			// ]);

            $respuesta = $this->authRepository->register($request->all());

            // Enviar Correo
            $tokenActivacion = Str::random(64);
            request()->merge([ 'tokenActivacion' => $tokenActivacion ]);
            // $this->_emailAlertRepository->usuarioRegistrado($request);

			// ** Crear Token de acceso Personal para el usuario
			$token = $respuesta->createToken('auth_token')->plainTextToken ?? null;

			return response()->json([
				'access_token' => $token,
				'token_type' => 'Bearer',
                'tokenActivacion' => $tokenActivacion,
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
			], 200);
		}catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
	}

    public function activateAccount($key)
    {
        try {

            $updatePassword = DB::table('users')
            ->where([
                'email' => request('email'),
                'token_activate' => request('token_activate')
            ])
            ->first();

            if(!$updatePassword){
                return response()->json(["error" =>  'Invalido token!'], 404);
            }

            $user = User::where('email', request('email'))
            ->where('token_activate', request('token_activate'))
            ->update([
                'email_verified_at' => Carbon::now()->format('Y-d-m H:i:s'),
                'token_activate' => null
            ]);

			return response()->json(["msg" => 'Cuenta Activada con exito!! '], 200);

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

    public function getRegisterHome(Request $request, $key)
    {
        try{
            $respuesta =  $this->authRepository->getRegisterHome($request);

            return response()->json(["data" => $respuesta], 200);

        }catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
    }

}
