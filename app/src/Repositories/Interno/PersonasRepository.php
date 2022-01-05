<?php
namespace App\src\Repositories\Interno;

use App\src\Interfaces\Interno\PersonasInterface;
use App\Models\Interno\Persona;
use Carbon\Carbon;
use Illuminate\Http\Request;
use stdClass;
use Illuminate\Support\Facades\DB;

class PersonasRepository implements PersonasInterface
{
    /**
    * Create a new Interno/PersonasRepository composer.
    * @return void
    */
    public function search(Request $request){

    }

    public function lista(string $page){
        $datos = Persona::all();
        return $datos;
    }

    public function create(Request $request){
        $persona = new Persona(
			[
				'nombres' => $request->nombres,
                'apellido_paterno' => $request->apellido_paterno,
                'apellido_materno' => $request->apellido_materno,
                'search' => $request->nombres.' '.$request->apellido_paterno.' '.$request->apellido_materno,
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

    public function agregarPersonaUser(Request $request)
    {
        $persona = Persona::find($request->id_persona);
        $id_user = $request->id_user;

        $persona->users()->attach( $id_user, [
            'created_by' => $id_user,
            'created_at' => Carbon::now()->format('Y-d-m H:i:s'),
            'state' => 1
        ]);

        return $persona;
    }

    public function deletePersonaUser(Request $request){
        $persona = Persona::with('users')->find($request->id_persona);
        $id_user = $request->id_user;

        $persona->users()->detach($id_user);
        return $persona;
    }

    public function listaPersonaModulos(string $personaID)
    {
        $personaModulo = "exec [Listar].[Persona_modulo] ".$personaID;

        $personaModulo = DB::select($personaModulo);

        return $personaModulo;
    }

}
