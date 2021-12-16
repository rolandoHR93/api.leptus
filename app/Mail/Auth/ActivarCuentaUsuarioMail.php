<?php

namespace App\Mail\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ActivarCuentaUsuarioMail extends Mailable
{
    use Queueable, SerializesModels;

    private $mensaje;

    public function __construct($mensaje){
        $this->mensaje = $mensaje;
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
                'mensaje' => $this->mensaje,
                'orderPrice' => 'S/. 1450 ',
            ]);
    }
}
