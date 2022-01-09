<?php

namespace App\Mail\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CambiarPasswordMail extends Mailable
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
        $this->request->email ?? 'leptus@tes.com';
        // -----------------

        return $this->subject('Cambio de Contraseña - Leptus')
            ->view('emails.pages.Auth.CambiarPassword')
            ->with([
                'request' => $this->request,
                'email' => $this->request->email,
                'token' => $this->request->token,
            ]);
    }
}
