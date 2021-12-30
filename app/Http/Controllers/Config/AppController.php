<?php

namespace App\Http\Controllers\Config;

use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

class AppController extends Controller
{
    public function backRefresh($key)
    {
            // Works Local 99% -
        try{
            if(request('username') != 'se' || request('password') != 'ripley4050' ){
                return response()->json(["msg"=> 'Invalido...✋🛑' ,"error" => 'Invalido'], 404);
            }

            $data = shell_exec("cd ". base_path() ." &&  git pull 2>&1");

            // $message = str_contains($data, '+-\n'); // strlen($string)
            $start = strrpos($data, 'changed')?:0;
            if($start != false){
                $text = substr($data, $start-15);
            }else{
                $text = '0';
            }

            // ---------------------
            return response()->json(["data" => $data, "msg" => "Exito 😄 ✔️ {$text}" , "date" => Date('H:i:s')], 200);

        }catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
