<?php
namespace App\src\Repositories\Interno;

use App\src\Interfaces\Interno\GrupoServiciosInterface;
use Illuminate\Support\Facades\DB;
use App\Models\Interno\GrupoServicios;
use Carbon\Carbon;
use Illuminate\Http\Request;
use stdClass;

class GrupoServiciosRepository implements GrupoServiciosInterface
{
    public function lista(int $meses=1){
        $prequery = "exec [Listar].[Precio_servicios] ${meses}";

        $resultados = DB::select($prequery);
        $datosProcesados = $this->procesarDatosJSon( $resultados);

        return $datosProcesados;
    }

    private function procesarDatosJSon( $resultados): array
    {

        $grouped = array();
        foreach ($resultados as $dato) {
            if(!array_key_exists($dato->nombre_grupo, $grouped)) {
                $newObject = new stdClass();

                $newObject->Grupo_Id = $dato->Grupo_Id;
                $newObject->nombre_grupo = $dato->nombre_grupo;
                $newObject->precio = $dato->precio;
                $newObject->Descripcion_Modulo = $dato->Descripcion_Modulo;
                $newObject->servicios = array();

                $grouped[$dato->nombre_grupo] = $newObject;
            }
            $taskObject = new stdClass();

            $taskObject->id = $dato->id;
            $taskObject->Nombre_Modulo = $dato->Nombre_Modulo;
            $taskObject->Descripcion_Modulo = $dato->Descripcion_Modulo;

            $grouped[$dato->nombre_grupo]->servicios[] = $taskObject;
            // $newJsArr[$dato->grupo_id][] = ["id" => $dato->id, "descripcion_servicio" => $dato->descripcion_servicio];
        }

        $array = array();

        // $array[] = array("id" => 1, "items" => array(["nombre" => "test", "precio" => "145"],
        // ["nombre" => "test 2", "precio" => "2222"]));
        // $array[] = array("id" => 2, "items" => array("nombre" => "test", "precio" => "145"));
        // $array[] = array("id" => 3, "items" => array("nombre" => "test", "precio" => "145"));
        // foreach ($resultados as $dato) {
        //     if(!array_search($dato->grupo_id, array_column($array, 'grupo_id'))){

        //         $array[] = array("grupo_id" => $dato->grupo_id);
        //         dd(!array_search($dato->grupo_id, array_column($array, 'grupo_id')));

        //     }
        //     // if(!array_search($dato->nombre_grupo, $grouped)) {
        //     //     $array[] = array("nombre_grupo" => $dato->nombre_grupo);
        //     // }
        // }

        return $grouped;
    }

    function convertObjectToArray($data) {
        if (is_object($data)) {
            $data = get_object_vars($data);
        }

        if (is_array($data)) {
            return array_map(__FUNCTION__, $data);
        }

        return $data;
    }

    public function create(Request $request){

    }
    public function update(Request $request, string $id){

    }
    public function delete(string $id){

    }


}
