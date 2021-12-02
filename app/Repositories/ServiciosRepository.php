<?php
namespace App\Repositories;

use App\Models\ServiciosModel;
use stdClass;
use DB;

class ServiciosRepository implements ServiciosInterface
{
    /**
    * Create a new ServiciosRepository composer.
    * @return void
    */

    public function search(string $id){
    }

    public function lista(){
        $datos = ServiciosModel::get();

        return $datos;
    }
}
