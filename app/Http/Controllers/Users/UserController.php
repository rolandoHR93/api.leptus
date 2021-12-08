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
        $this->middleware('verifyApiCode');
        $this->userRepository = $userRepository;
    }

	public function lista($key){
		try {
            $usuarios =  $this->userRepository->lista();
			return response()->json($usuarios);
		}
		catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
	}
}
