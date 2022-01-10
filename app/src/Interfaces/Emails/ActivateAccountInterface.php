<?php
namespace App\src\Interfaces\Emails;
use Illuminate\Http\Request;

interface ActivateAccountInterface
{
    public function usuarioRegistrado(Request $request);


}
