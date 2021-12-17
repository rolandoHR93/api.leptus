<?php
namespace App\src\Repositories\Emails;

use App\Models\Interno\User;
use App\src\Interfaces\Emails\AlertInterface;
use App\Mail\Auth\ActivarCuentaUsuarioMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use stdClass;
use DB;


class AlertRepository implements AlertInterface
{

    public function usuarioRegistrado(Request $request):void{
        Mail::to('rolando167@hotmail.com')
				// ->cc('larosatoro979@gmail.com')
				->bcc('rolandoh00@gmail.com')
				->send(new ActivarCuentaUsuarioMail($request));
    }


}
