<?php
namespace App\Repositories;

use App\Models\User;
use DB;

class UserRepository implements UserInterface {

    public function lista(){
        $resultados = User::all();

        return $resultados;
    }
}

