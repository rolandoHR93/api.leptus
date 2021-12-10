<?php
namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Interno\PermisosSoftware;
use stdClass;
use DB;

class PermisosRepository implements PermisosInterface
{
    /**
    * Create a new PermisosRepository composer.
    * @return void
    */

    public function search(string $id){

    }

    public function lista(){

        $datos = PermisosSoftware::all();

        return $datos; 
    }
    public function create(Request $request){

    }
    public function update(Request $request, string $id){

    }
    public function delete(string $id){

    }
}
