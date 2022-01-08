<?php

namespace App\Http\Controllers\Interno\ForgotPassword;

use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use App\src\Repositories\Emails\ForgotPasswordRepository;
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
            $email = request('email');

            $this->_forgotPasswordEmailRepository->enviarCorreoCambiarPassword(request());

			return response()->json(["msg" =>  'exitos'], 200);

		}catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
    }

    public function changePassword($key)
    {
        try {
            $email = request('email');
            $password = request('password');


		}catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
    }
}
