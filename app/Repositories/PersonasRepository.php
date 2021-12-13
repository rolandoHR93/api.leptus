<?php
namespace App\Repositories;

use App\Models\Interno\Persona;
use Illuminate\Http\Request;

class PersonasRepository implements PersonasInterface
{
    public function search(string $id){

    }

    public function lista(){

        $datos = Persona::all();

        return $datos;
    }

    public function create(Request $request){
        $persona = new Persona(
			[
				'nombres' => $request->nombres,
                'Apellido_paterno' => $request->apellido_paterno,
                'Apellido_materno' => $request->apellido_materno,
                'search' => $request->search,
				'state' => 1,
				'created_by' => 1,
				'updated_by' => 1
			]
		);
		$persona->save();

		return $persona;
    }

    public function update(Request $request, string $id){
        $persona = Persona::FindOrFail($id);

		$persona->update([
			    'nombres' => $request->nombres,
                'Apellido_paterno' => $request->apellido_paterno,
                'Apellido_materno' => $request->apellido_materno,
                'search' => $request->search,
		]);

		return $persona;
    }

    public function delete(string $id){
        $destroy = Persona::destroy($id);

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