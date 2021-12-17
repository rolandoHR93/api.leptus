<?php
namespace App\src\Interfaces\Emails;
use Illuminate\Http\Request;

interface AlertInterface
{
    // public function search(Request $request);

    //----- Usuarios
    public function usuarioRegistrado(Request $request);


    //----- Ventas


}
