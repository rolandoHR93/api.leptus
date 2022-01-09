<?php

namespace App\Http\Controllers\Interno\ForgotPassword;

use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\src\Repositories\Emails\ForgotPasswordRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Exception;

class ForgotPasswordController extends Controller
{
    protected $_forgotPasswordEmailRepository;

    public function __construct(ForgotPasswordRepository $_forgotPasswordEmailRepository)
    {
        $this->middleware('verifyApiCode');
        $this->_forgotPasswordEmailRepository = $_forgotPasswordEmailRepository;
    }

    public function forgotPassword($key)
    {   // Envia Correo Link para ingresar nueva Password
        try {
            request()->validate([
                'email' => 'required|email|exists:users',
            ]);

            $token = Str::random(64);
            request()->merge([ 'token' => $token ]);

            DB::table('password_resets')->insert([
                'email' => request('email'),
                'token' => request('token'),
                'created_at' => Carbon::now()
              ]);

            $this->_forgotPasswordEmailRepository->enviarCorreoCambiarPassword(request());

			return response()->json(["msg" =>  'Correo enviado 📧'], 200);

		}catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
    }

    public function changePassword($key)
    {
        try {

            request()->validate([
                'email' => 'required|email|exists:users',
                'password' => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required'
            ]);

            $updatePassword = DB::table('password_resets')
                ->where([
                    'email' => request('email'),
                    'token' => request('token')
                ])
                ->first();

            if(!$updatePassword){
			    return response()->json(["error" =>  'Invalid token!'], 404);
            }

            $user = User::where('email', request('email'))
                ->update(['password' => Hash::make(request('password'))]);

            DB::table('password_resets')->where(['email'=> request('email')])->delete();

			return response()->json(["msg" =>  'Contraseña Cambiada '], 200);

		}catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
    }
}
