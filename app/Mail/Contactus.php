<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contactus extends Mailable
{
    use Queueable, SerializesModels;
    
    public $emaill;
    public $messagee;
    public $namee;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($messagee,$emaill,$namee)
    {
        $this->emaill = $emaill;
        $this->messagee = $messagee;
        $this->namee = $namee;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->emaill)
        ->view('site.mail.conact')
        // ->with([
        //     'message' => $this->message,
        // ])
        ->subject('Chief Khalil');
    }
}
