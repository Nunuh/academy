<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WorkshopMail extends Mailable
{
    use Queueable, SerializesModels;

    public $ws;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ws)
    {
        $this->ws = $ws;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Pendaftaran Workshop Jahitin Academy')
            ->from('academy@jahitin.com')
            ->view('user.emailWorkshop')
            ->with('ws', $this->ws);
    }
}
