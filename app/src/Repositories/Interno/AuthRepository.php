<?php
namespace App\src\Repositories\Interno;

use App\Models\Interno\Persona;
use App\src\Interfaces\Interno\AuthInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use stdClass;

class AuthRepository implements AuthInterface
{

    public function getRegisterHome(Request $request){
        $departamentos = "exec [Listar].[Departamento]";
        $sexos = "exec [Listar].[Sexo]";
        $TipoDocPersona = "exec [Listar].[TipoDocPersona]";
        $TipoDocEmpresa = "exec [Listar].[TipoDocEmpresa]";

        // ------------
        $departamentos = DB::select($departamentos);
        $sexos = DB::select($sexos);
        $TipoDocPersona = DB::select($TipoDocPersona);
        $TipoDocEmpresa = DB::select($TipoDocEmpresa);

        // ------------
        return array(
           'departamentos'  => $departamentos,
           'sexos'  =>  $sexos,
           'TipoDocPersona'  =>  $TipoDocPersona,
           'TipoDocEmpresa'  =>  $TipoDocEmpresa,

        );

    }

    public function register(array $data){

        $user = User::create([
            'nombres'  => $data['nombres'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'state' => 0
            // 'create_at'=> Carbon::now(),
            // 'updated_at'=> Carbon::now(),
        ]);

        $persona = Persona::create([
            'nombres' => $data['nombres'],
            'apellido_paterno' => $data['apellido_paterno'],
            'apellido_materno' => $data['apellido_materno'],
            'search' => $data['nombres'].' '.$data['apellido_paterno'].' '.$data['apellido_materno'],
			'state' => 0,
            'nro_doc' => $data['nro_doc'],
            'tipo_doc_persona' => $data['tipo_doc_persona'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'sexo_id' => $data['sexo_id'],
            'direccion' => $data['direccion'],
            'ubigeo_id' => $data['ubigeo_id']
            // 'create_at'=> Carbon::now(),
            // 'updated_at'=> Carbon::now(),
        ]);

        $persona->users()->attach( $user->id, [
            'created_by' => $user->id,
            'created_at' => Carbon::now()->format('Y-d-m H:i:s'),
            'state' => 0
        ]);

        return $user;
    }

    public function login(object $data){


        $user = User::where('email', $data['email'])->firstOrFail();

        return $user;
    }

    public function signout(){
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Tokens Revoked'
        ];
    }

}
