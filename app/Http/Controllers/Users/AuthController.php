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
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

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

    public function backRefresh($key)
    {
            // Works Local 99% -
        try{
            if(request('username') != 'se' || request('password') != 'ripley4050' ){
                return response()->json(["msg"=> 'Invalido...✋🛑' ,"error" => 'Invalido'], 404);
            }
            // Works Local 99% -
            $data = shell_exec("cd ". base_path() ." &&  git pull 2>&1");

            // $message = str_contains($data, '+-\n');
            $start = strrpos($data, '+-')?:0;
            if($start != false){
                $text = substr($data, $start);
            }else{
                $text = '0';
            }
            // ---------------------
            return response()->json(["data" => $data, "msg" => "Exito 😄 ✔️ {$text}" , "date" => Date('H:i:s')], 200);

        }catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function test($key)
    {
        $data = 'From https://github.com/rolandoHR93/api.leptus\n 66d98be..95cd929 master -> origin/master\nUpdating 66d98be..95cd929\nFast-forward\n resources/views/welcome.blade.php | 2 +-\n 1 file changed, 1 insertion(+), 1 deletion(-)\n';
            // $message = str_contains($data, '+-\n');
        $start = strrpos($data, '+-') ;

        if($start != false){
            $text = substr($data, $start);
        }else{
            $text = '0';
        }
        dd($text);
    }
}
