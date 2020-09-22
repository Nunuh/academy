<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotMail extends Mailable
{
    use Queueable, SerializesModels;

    public $us;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($us)
    {
        $this->us = $us;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Lupa Password')
            ->from('academy@jahitin.com')
            ->view('user.forgotPassword');
    }
}
