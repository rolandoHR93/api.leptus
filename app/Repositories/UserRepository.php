<?php
namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Interno\User;
use DB;

class UserRepository implements UserInterface {

    public function lista(){
        $resultados = User::all();

        return $resultados;
    }

    public function create(Request $request){

    }
    public function update(Request $request, string $id){

    }
    public function delete(string $id){

    }
}

