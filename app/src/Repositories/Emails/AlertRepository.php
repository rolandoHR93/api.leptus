<?php
namespace App\src\Repositories\Emails;

use App\Models\User;
use App\src\Interfaces\Emails\AlertInterface;
use App\Mail\Auth\ActivarCuentaUsuarioMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use stdClass;
use DB;


class AlertRepository implements AlertInterface
{

    public function usuarioRegistrado(Request $request){
        // Envia un correo de bienvenida al registrarse
        Mail::to(request('email'))
				// ->cc('larosatoro979@gmail.com')
				->bcc('rolando167@hotmail.com')
				->send(new ActivarCuentaUsuarioMail($request));
        return 1;
    }


}
