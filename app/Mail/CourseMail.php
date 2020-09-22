<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CourseMail extends Mailable
{
    use Queueable, SerializesModels;
    public $kurs;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($kurs)
    {
        $this->kurs = $kurs;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Pendaftaran Kelas Jahitin Academy')
            ->from('academy@jahitin.com')
            ->view('user.emailCourse')
            ->with('kurs', $this->kurs);
    }
}
