<?php

namespace App\Mail\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ActivarCuentaUsuarioMail extends Mailable
{
    use Queueable, SerializesModels;

    public $message;

    public function __construct($message){
        $this->message = $message;
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
                'content' => $this->message,
                'orderPrice' => 'S/. 1450 ',
            ]);
    }
}
