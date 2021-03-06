<?php
namespace App\src\Repositories\Interno;

use App\src\Interfaces\Interno\RolesInterface;
use App\Models\Interno\Roles;
use Illuminate\Http\Request;
use stdClass;
use DB;

class RolesRepository implements RolesInterface
{
    /**
    * Create a new Interno/RolesRepository composer.
    * @return void
    */
    public function search(Request $request){

    }

    public function lista(string $page){
        $datos = Roles::all();

        return $datos;
    }
    public function create(Request $request){
        $rol = new Roles(
			[
				'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'clave_rol' => $request->clave_rol,
				'state' => 1,
				'created_by' => 1,
				'updated_by' => 1
			]
		);
		$rol->save();

		return $rol;
    }
    public function update(Request $request, string $id){
        $rol = Roles::FindOrFail($id);

		$rol->update([
			'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'clave_rol' => $request->clave_rol,
		]);

		return $rol;
    }
    public function delete(string $id){
        $destroy = Roles::destroy($id);

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
