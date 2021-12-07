<?php
namespace App\Repositories;

use App\Models\Interno\User;
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

    public function login(object $data){


        $user = User::where('email', $data['email'])->firstOrFail();

        return $user;
    }

    public function signout(){
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Tokens Revoked'
        ];
    }
}

