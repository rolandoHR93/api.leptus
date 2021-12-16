<?php

namespace App\Mail\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ActivarCuentaUsuarioMail extends Mailable
{
    use Queueable, SerializesModels;

    private $request;

    public function __construct($request){
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        return $this->subject('Test Prueba Mail')
            ->view('emails.pages.Auth.ActivarCuenta')
            ->with([
                'request' => $this->request,
                'orderPrice' => 'S/. 1450 ',
            ]);
    }
}
