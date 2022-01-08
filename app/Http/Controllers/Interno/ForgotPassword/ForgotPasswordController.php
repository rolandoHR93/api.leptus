<?php

namespace App\Http\Controllers\Interno\ForgotPassword;

use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

class ForgotPasswordController extends Controller
{
    protected $repository;

    public function __construct()
    {
        $this->middleware('verifyApiCode');
        // $this->repository = $repository;
    }

    public function forgotPassword($key)
    {
        try {
            $email = request('email');

            // Envia Correo Link para ingresar nueva Password
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
