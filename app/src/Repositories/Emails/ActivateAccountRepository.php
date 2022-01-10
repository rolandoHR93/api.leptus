<?php
namespace App\src\Repositories\Emails;

use App\src\Interfaces\Emails\ActivateAccountInterface;
use App\Mail\Auth\ActivarCuentaUsuarioMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\User;
use stdClass;
use DB;

class ActivateAccountRepository implements ActivateAccountInterface
{
    /**
    * Create a new Emails\ActivateAccountRepository composer.
    * @return void
    */
    public function usuarioRegistrado(Request $request){
        // Envia un correo de bienvenida al registrarse
        Mail::to(request('email'))
				// ->cc('larosatoro979@gmail.com')
				->bcc('rolando167@hotmail.com')
				->send(new ActivarCuentaUsuarioMail($request));
        return 1;
    }

}
