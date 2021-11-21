<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

	public function register(Request $request){
		try {
			$validateData = $request->validate([
				'name' => 'required|string|max:255',
				'email' => 'required|string|email|max:255|unique:users',
				'password' => 'required|string|min:6',
			]);

			$user = User::create([
				'name'  => $validateData['name'],
				'email' => $validateData['email'],
				'password' => Hash::make($validateData['password']),
			]);

			// ** Crear Token de acceso Personal para el usuario
			$token = $user->createToken('auth_token')->plainTextToken;

			return response()->json([
				'access_token' => $token,
				'token_type' => 'Bearer',
			]);

		} catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}

	}

	public function login(Request $request){
		try {
			if(!Auth::attempt($request->only('email', 'password'))){
				return response()->json([
					'message' => 'Invalid login details'
				], 401);
			}
			$user = User::where('email', $request['email'])->firstOrFail();
			$token = $user->createToken('auth_token')->plainTextToken;

			return response()->json([
				'access_token' => $token,
				'token_type' => 'Bearer',
                'user' => $user
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
            auth()->user()->tokens()->delete();

            return [
                'message' => 'Tokens Revoked'
            ];
        }catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
