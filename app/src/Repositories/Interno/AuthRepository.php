<?php
namespace App\src\Repositories\Interno;

use App\Models\Interno\Persona;
use App\Models\Interno\Empresa;
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
            'nombres'  => $data['persona']['nombres'],
            'email' => $data['usuario']['email'],
            'password' => Hash::make($data['usuario']['password']),
            'token_activate' => '4554545',
            'state' => 0
            // 'create_at'=> Carbon::now(),
            // 'updated_at'=> Carbon::now(),
        ]);

        $persona = Persona::create([
            'nombres' => $data['persona']['nombres'],
            'apellido_paterno' => $data['persona']['apellido_paterno'],
            'apellido_materno' => $data['persona']['apellido_materno'],
            'search' => $data['persona']['nombres'].' '.$data['persona']['apellido_paterno'].' '.$data['persona']['apellido_materno'],
            'nro_doc' => $data['persona']['nro_documento'],
            'tipo_doc_persona' => $data['persona']['tipo_documento'],
            'fecha_nacimiento' => $data['persona']['fecha_nacimiento'],
            'sexo_id' => $data['persona']['sexo'],
            'direccion' => $data['persona']['direccion'],
            'ubigeo_id' => $data['persona']['distrito'],
            'created_by' => $user->id,
			'state' => 0,
            // 'create_at'=> Carbon::now(),
            // 'updated_at'=> Carbon::now(),
        ]);

        $persona->users()->attach( $user->id, [
            'created_by' => $user->id,
            'created_at' => Carbon::now()->format('Y-d-m H:i:s'),
            'state' => 0
        ]);

        $empresa = Empresa::create([
            'Tipo_Documento' => $data['empresa']['tipo_documento'],
            'NroDocumento' => $data['empresa']['nro_documento'],
            'Ubigeo_id' => $data['empresa']['distrito'],
            'Direccion' => $data['empresa']['direccion'],
            'NroContacto' => $data['empresa']['nro_contacto'],
            'RazonSocial' => $data['empresa']['razon_social'],
            'NombreComercial' => $data['empresa']['nombre_comercial'],
            'created_by'  => $user->id,
			'state' => 0,
        ]);

        $user->update([
			'empresa_id' => $empresa->id,
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
