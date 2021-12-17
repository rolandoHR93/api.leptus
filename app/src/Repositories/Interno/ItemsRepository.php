<?php
namespace App\src\Repositories\Interno;

use App\Models\Interno\Items;
use App\src\Interfaces\Interno\ItemsInterface;
use Illuminate\Http\Request;

class ItemsRepository implements ItemsInterface
{
    /**
    * Create a new Interno/ItemsRepository composer.
    * @return void
    */
    public function search(Request $request){

    }

    public function lista(string $page){
        $elementos = Items::all();

        return $elementos;
    }
    public function create(Request $request){
        $item = new Items(
			[
				'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'categoria_id' => 1,
                'ruta' => $request->ruta,
				'state' => 1,
				'created_by' => 1,
				'updated_by' => 1
			]
		);
		$item->save();

		return $item;
    }
    public function update(Request $request, string $id){
        $item = Items::FindOrFail($id);

		$item->update([
			'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'ruta' => $request->ruta,
		]);

		return $item;
    }
    public function delete(string $id){
        $destroy = Items::destroy($id);

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