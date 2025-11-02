<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InforNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mensaje;
    public function __construct($mensaje)
    {
        $this->mensaje = $mensaje;
    }

    public function build()
    {
        return $this->subject('Los libros se cargaron jefe')->view('email.notification');
    }

}
