<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FailMail extends Mailable
{
    use Queueable, SerializesModels;

    public $fail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fail)
    {
        $this->fail = $fail;
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
            ->subject('Pemberitahuan Hasil Verifikasi')
            ->view('user.emailFail')
            ->with('fail', $this->fail);
    }
}
