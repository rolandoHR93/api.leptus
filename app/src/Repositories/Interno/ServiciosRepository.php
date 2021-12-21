<?php
namespace App\src\Repositories\Interno;

use App\src\Interfaces\Interno\ServiciosInterface;
use App\Models\Interno\ServiciosModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use stdClass;
use DB;

class ServiciosRepository implements ServiciosInterface
{
    /**
    * Create a new Interno/ServiciosRepository composer.
    * @return void
    */
    public function search(Request $request){

    }

    public function lista(string $page){
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

        // $test = $servicio->getDateFormat();
        // dd($test);

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

	public function agregarGrupoServicio(Request $request)
    {
        $servicio = ServiciosModel::with('gruposervicios')->find($request->servicios_id);
        $gruposervicios_id = $request->gruposervicios_id;

        $servicio->gruposervicios()->attach( $gruposervicios_id, [
			'state' => 1,
			'updated_by' => 1,
            'created_by' => $request->created_by,
            'created_at' => Carbon::now()->format('Y-d-m H:i:s')
        ]);

        return $servicio;
    }

    public function deleteGrupoServicio(Request $request){
        $servicio = ServiciosModel::with('gruposervicios')->find($request->servicios_id);
        $gruposervicios_id = $request->gruposervicios_id;

        $servicio->gruposervicios()->detach($gruposervicios_id);
        return $servicio;
    }
}
