<?php
namespace App\Repositories;

use App\Models\Interno\Roles;
use Illuminate\Http\Request;
use stdClass;
use DB;

class RolesRepository implements RolesInterface
{
    /**
    * Create a new RolesRepository composer.
    * @return void
    */

    public function search(string $id){

    }

    public function lista(){

        $datos = Roles::all();

        return $datos;
    }
    public function create(Request $request){

    }
    public function update(Request $request, string $id){

    }
    public function delete(string $id){

    }
}
