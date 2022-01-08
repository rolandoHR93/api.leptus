<?php
namespace App\src\Repositories\Emails;

use App\src\Interfaces\Emails\ForgotPasswordInterface;
use App\Models\User;
use Illuminate\Http\Request;
use stdClass;
use DB;

class ForgotPasswordRepository implements ForgotPasswordInterface
{
    /**
    * Create a new Emails\ForgotPasswordRepository composer.
    * @return void
    */
    public function enviarCorreoCambiarPassword(Request $request){

    }



}
