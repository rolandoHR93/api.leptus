<?php
namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Interno\GrupoServicios;
use stdClass;
use DB;

class GrupoServiciosRepository implements GrupoServiciosInterface {

    public function lista(int $meses=1){
        $prequery = 'SELECT	a.id,
                    b.id Grupo_Id,
                    b.nombre_grupo,
                    b.descripcion Descripcion_Modulo,
                    b.Meses,
                    B.precio,
                    c.Nombre_Servicio Nombre_Modulo,
                    c.Descripcion Descripcion_Servicio,
                    sum(c.precio) over (partition by b.id order by a ROWS BETWEEN UNBOUNDED PRECEDING AND UNBOUNDED FOLLOWING)* Meses Precio_Regular,
                    sum(c.precio) over (partition by b.id order by a ROWS BETWEEN UNBOUNDED PRECEDING AND UNBOUNDED FOLLOWING)* Meses - B.precio Precio_Ahorro,
                    (1 - round( CAST(float8 (B.precio/(sum(c.precio) over (partition by b.id order by a ROWS BETWEEN UNBOUNDED PRECEDING AND UNBOUNDED FOLLOWING)* Meses))as numeric), 2))*100 Precio_Ahorro_Porcentaje
                    FROM	leptus.grupo_servicios A
                    INNER JOIN leptus."grupoServicios" B
                    ON		A.GrupoServicios_id = b.id
                    INNER JOIN leptus.servicios C
                    ON		A.Servicios_id = c.Id
                    where b.Meses = '.$meses.'
                    order by 1';

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

                $newObject->grupo_id = $dato->grupo_id;
                $newObject->nombre_grupo = $dato->nombre_grupo;
                $newObject->precio = $dato->precio;
                $newObject->descripcion_modulo = $dato->descripcion_modulo;
                $newObject->servicios = array();

                $grouped[$dato->nombre_grupo] = $newObject;
            }
            $taskObject = new stdClass();

            $taskObject->id = $dato->id;
            $taskObject->nombre_modulo = $dato->nombre_modulo;
            $taskObject->descripcion_modulo = $dato->descripcion_modulo;

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

