<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Exception;

class UserController extends Controller
{
	public function lista(){
		try {
			return response()->json([]);
		}
		catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
	}
}
