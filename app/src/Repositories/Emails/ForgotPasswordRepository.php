<?php
namespace App\src\Repositories\Emails;

use App\src\Interfaces\Emails\ForgotPasswordInterface;
use App\Mail\Auth\CambiarPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\User;
use stdClass;
use DB;

class ForgotPasswordRepository implements ForgotPasswordInterface
{
    /**
    * Create a new Emails\ForgotPasswordRepository composer.
    * @return void
    */
    public function enviarCorreoCambiarPassword(Request $request){
        Mail::to('rolando167@hotmail.com')
				// ->cc('larosatoro979@gmail.com')
				->bcc('rolandoh00@gmail.com')
				->send(new CambiarPasswordMail($request));
        return 1;
    }



}
