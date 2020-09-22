<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GratisMail extends Mailable
{
    use Queueable, SerializesModels;

    public $free;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($free)
    {
        $this->free = $free;
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
            ->subject('Selamat Bergabung di Workshop Jahit Masker')
            ->view('user.emailFree')
            ->with('free', $this->free);
    }
}
