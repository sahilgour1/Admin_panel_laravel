<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendWelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $welcomeMessage;

    /**
     * Create a new message instance.
     *
     * @param string $welcomeMessage
     */
    public function __construct($welcomeMessage)
    {
        $this->welcomeMessage = $welcomeMessage; // Changed variable name
    }

    /**
     * Build the email.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Welcome Email')
                    ->view('welcomemail')
                    ->with(['welcomeMessage' => $this->welcomeMessage]); // Changed key
    }
}
