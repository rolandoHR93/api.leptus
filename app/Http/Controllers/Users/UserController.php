<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Exception;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

	public function lista(string $key){
        if($key != 'iT3BnOENtV30pxRDadZ99e43wbDL4NA9')
                abort(404);
		try {
            $usuarios =  $this->userRepository->lista();
			return response()->json($usuarios);
		}
		catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
	}
}
