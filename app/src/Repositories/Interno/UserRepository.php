<?php
namespace App\src\Repositories\Interno;

use App\src\Interfaces\Interno\UserInterface;
use Illuminate\Http\Request;
use App\Models\User;
use stdClass;
use DB;

class UserRepository implements UserInterface
{
    /**
    * Create a new Interno/UserRepository composer.
    * @return void
    */
    public function search(Request $request){

    }

    public function lista(string $page){
        $resultados = User::all();

        return $resultados;
    }

    public function create(Request $request){
        $user = new User(
			[
				'nombres' => $request->nombres,
                'apellidos' => $request->apellidos,
                'email' => $request->email,
                'password' => $request->password,
				'state' => 1,
				'created_by' => 1,
				'updated_by' => 1
			]
		);
		$user->save();

		return $user;
    }
    public function update(Request $request, string $id){
        $user = User::FindOrFail($id);

		$user->update([
			'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'password' => $request->password,
		]);

		return $user;
    }
    public function delete(string $id){
        $destroy = User::destroy($id);

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
