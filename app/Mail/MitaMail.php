<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MitaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mitra;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mitra)
    {
        $this->mitra = $mitra;
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
            ->subject('Jahitin Partners')
            ->view('user.mitraMail')
            ->with('mitra', $this->mitra);
    }
}
