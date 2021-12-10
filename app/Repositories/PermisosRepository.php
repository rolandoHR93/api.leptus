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
        $permiso = new PermisosSoftware(
			[
				'descripcion' => $request->descripcion,
                'nombre_clave' => $request->nombre_clave,
                'state' => 1,
				'created_by' => 1,
                'updated_by' => 1
			]
		);
		$permiso->save();

		return $permiso;
    }
    public function update(Request $request, string $id){
        $permiso = PermisosSoftware::FindOrFail($id);

		$permiso->update([
			'descripcion' => $request->descripcion,
            'nombre_clave' => $request->nombre_clave,
		]);

		return $permiso;
    }
    public function delete(string $id){
        $destroy = PermisosSoftware::destroy($id);

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
