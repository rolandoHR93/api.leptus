<?php
namespace App\src\Repositories\Interno;

use App\src\Interfaces\Interno\PermisosInterface;
use App\Models\Interno\PermisosSoftware;
use Illuminate\Http\Request;
use stdClass;
use DB;

class PermisosRepository implements PermisosInterface
{
    /**
    * Create a new Interno/PermisosRepository composer.
    * @return void
    */
    public function search(Request $request){

    }

    public function lista(string $page){

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
