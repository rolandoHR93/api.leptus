<?php
namespace App\src\Repositories\Interno;

use App\Models\Interno\Ubigeo;
use App\src\Interfaces\Interno\UbigeoInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use stdClass;

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

    public function getProvincias(string $departamentoID)
    {
        $departamentos = "exec [Listar].[Provincia] '${departamentoID}'";
        $departamentos = DB::select($departamentos);
        return $departamentos;
    }

    public function getDistritos(string $departamentoID, string $provinciaID)
    {
        $distritos = "exec [Listar].[Distrito] '${departamentoID}', '${provinciaID}'";
        $distritos = DB::select($distritos);
        return $distritos;
    }
}
