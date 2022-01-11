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
        $email = $this->request->email ?? 'leptus@tes.com';

        return $this->subject('Activar Cuenta - Leptus')
            ->view('emails.pages.Auth.ActivarCuenta')
            ->with([
                'request' => $this->request,
                'email' => $email,
                'token_activate' => $this->request->token_activate,
            ]);
    }
}
