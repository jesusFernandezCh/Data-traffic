<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PasswordEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $distributor;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($stmt)
    {
        $this->distributor = $stmt;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $distributor = $this->distributor;
        return $this->view('view.mails.',compact('distributor'));
    }
}
