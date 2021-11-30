<?php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;

class AuthRepository implements AuthInterface {

    public function register(array $data){

        $user = User::create([
            'nombres'  => $data['nombres'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return $user;
    }

    public function login(array $data){
        $resultados = User::all();

        return $resultados;
    }

    public function signout(){
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Tokens Revoked'
        ];
    }
}

