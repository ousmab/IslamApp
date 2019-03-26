<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailReponseQuestion extends Mailable
{
    use Queueable, SerializesModels;
    public $emeteur;
    public $reponse;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emeteur,$reponse)
    {
        $this->emeteur = $emeteur;
        $this->reponse = $reponse;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.reponse_qu');
    }
}
