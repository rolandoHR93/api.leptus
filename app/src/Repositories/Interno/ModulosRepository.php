<?php
namespace App\src\Repositories\Interno;

use App\Models\Interno\Modulos;
use App\src\Interfaces\Interno\ModulosInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use stdClass;
use DB;

class ModulosRepository implements ModulosInterface
{
    /**
    * Create a new Interno/RolesRepository composer.
    * @return void
    */
    public function search(Request $request){

    }

    public function lista(string $page){
        $modulos = Modulos::all();

        return $modulos;
    }
    public function create(Request $request){
        $modulos = new Modulos(
			[
				'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'ruta' => $request->ruta,
				'tipo_id' => 1,
                'modulo_id' => 1,
                'state' => 1,
				'created_by' => 1,
				'updated_by' => 1
			]
		);
		$modulos->save();

		return $modulos;
    }
    public function update(Request $request, string $id){
        $modulos = Modulos::FindOrFail($id);

		$modulos->update([
			'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'ruta' => $request->ruta,
		]);

		return $modulos;
    }
    public function delete(string $id){
        $destroy = Modulos::destroy($id);

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

    public function agregarModuloItem(Request $request)
    {
        $modulo = Modulos::with('items')->find($request->modulo_id);
        $item_id = $request->item_id;

        $modulo->items()->attach( $item_id, [
            'created_by' => $request->created_by,
            'created_at' => Carbon::now()->format('Y-d-m H:i:s')
        ]);

        return $modulo;
    }

}
