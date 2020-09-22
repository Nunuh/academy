<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DokumenMail extends Mailable
{
    use Queueable, SerializesModels;

    public $dok;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dok)
    {
        $this->dok = $dok;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('academy@jahitin.com')
            ->subject('Selamat!, Anda telah menyelesaikan workshop')
            ->view('user.emaildokumentasi')
            ->with('dok', $this->dok);
    }
}
