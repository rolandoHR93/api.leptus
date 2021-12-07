<?php
namespace App\Repositories;

use App\Models\Interno\ServiciosModel;
use Illuminate\Http\Request;
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
		$datos = ServiciosModel::where('state', 1)->get();

		return $datos;
	}

	public function createServicio(Request $request){

		$servicio = new ServiciosModel(
			[
				'nombre_servicio' => $request->nombre_servicio,
				'descripcion' => $request->descripcion,
				'nombre_clave' => $request->nombre_clave,
				'precio' => $request->precio,
				'stock' => $request-> stock,
				'flag' => $request->flag,
				'state' => 1,
				'created_by' => 1,
				'updated_by' => 1
			]
		);
		$servicio->save();

		return $servicio;
	}

	function updateServicio(Request $request, string $id){

		$servicio = ServiciosModel::FindOrFail($id);

		$servicio->update([
			'nombre_servicio' => $request->nombre_servicio,
			'descripcion' => $request->descripcion,
			'nombre_clave' => $request->nombre_clave,
			'precio' => $request->precio,
			'stock' => $request-> stock,
			'flag' => $request->flag,
		]);

		return $servicio;
	}

	function deleteServicio(string $id){
        $destroy = ServiciosModel::destroy($id);

        if ($destroy){
            return  [
                'status'=>'1',
                'msg'=>'success'
            ];

        }else{
            return[
                'status'=>'0',
                'msg'=>'fail'
            ];
        }
	}


}
