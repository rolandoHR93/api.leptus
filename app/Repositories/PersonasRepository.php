<?php
namespace App\Repositories;

use App\Models\Interno\Persona;
use Illuminate\Http\Request;

class PersonasRepository implements PersonasInterface
{
    public function search(string $id){

    }

    public function lista(){

        $datos = Persona::all();

        return $datos;
    }

    public function create(Request $request){
        
    }

    public function update(Request $request, string $id){
        
    }

    public function delete(string $id){
        
    }
}