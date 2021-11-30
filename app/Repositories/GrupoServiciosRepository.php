<?php
namespace App\Repositories;

use App\Models\GrupoServicios;
use DB;

class GrupoServiciosRepository implements GrupoServiciosInterface {

    public function lista(){
        $prequery = 'SELECT	a.id,
                    b.id Grupo_Id,
                    b.nombre_grupo,
                    b.descripcion Descripcion_Servicio,
                    b.Meses,
                    B.precio,
                    c.Nombre_Servicio Nombre_Modulo,
                    c.Descripcion Descripcion_Modulo,
                    sum(c.precio) over (partition by b.id order by a ROWS BETWEEN UNBOUNDED PRECEDING AND UNBOUNDED FOLLOWING)* Meses Precio_Regular,
                    sum(c.precio) over (partition by b.id order by a ROWS BETWEEN UNBOUNDED PRECEDING AND UNBOUNDED FOLLOWING)* Meses - B.precio Precio_Ahorro,
                    (1 - round( CAST(float8 (B.precio/(sum(c.precio) over (partition by b.id order by a ROWS BETWEEN UNBOUNDED PRECEDING AND UNBOUNDED FOLLOWING)* Meses))as numeric), 2))*100 Precio_Ahorro_Porcentaje
                    FROM	leptus.grupo_servicios A
                    INNER JOIN leptus."grupoServicios" B
                    ON		A.GrupoServicios_id = b.id
                    INNER JOIN leptus.servicios C
                    ON		A.Servicios_id = c.Id
                    order by 1';

        $resultados = DB::select($prequery);
        return $resultados;
    }
}

