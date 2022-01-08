<?php
namespace App\src\Interfaces\Emails;
use Illuminate\Http\Request;

interface ForgotPasswordInterface
{
    public function enviarCorreoCambiarPassword(Request $request);

}
