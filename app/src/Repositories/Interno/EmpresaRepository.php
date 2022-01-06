<?php
namespace App\src\Repositories\Interno;

use App\src\Interfaces\Interno\EmpresaInterface;
use App\Models\Interno\Empresa;
use Illuminate\Http\Request;
use stdClass;
use DB;

class EmpresaRepository implements EmpresaInterface
{
    /**
    * Create a new Interno/EmpresaRepository composer.
    * @return void
    */
    public function search(Request $request){

    }

    public function lista(string $page){
        $empresa = Empresa::all();
        return $empresa;
    }

    public function create(Request $request){

    }

    public function update(Request $request, string $id){

    }

    public function delete(string $id){

    }

}
