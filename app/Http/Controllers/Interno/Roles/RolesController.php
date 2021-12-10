<?php

namespace App\Http\Controllers\Interno\Roles;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Exception;

class RolesController extends Controller
{
    public function lista($key)
    {
        try {


			return response()->json(['data' => ''], 200);
		}
		catch (Exception $e) {
			return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
		}
    }
}
