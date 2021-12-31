<?php
namespace App\src\Repositories\Interno;

use App\Models\Interno\Ubigeo;
use App\src\Interfaces\Interno\UbigeoInterface;
use App\Models\User;
use Illuminate\Http\Request;
use stdClass;
use DB;

class UbigeoRepository implements UbigeoInterface
{
    /**
    * Create a new Interno/UbigeoRepository composer.
    * @return void
    */
    public function search(Request $request){

    }

    public function lista(string $page){
        $ubigeo = Ubigeo::all();

        return $ubigeo;
    }

}
