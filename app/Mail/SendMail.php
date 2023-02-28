<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $testMailData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($testMailData)
    {
        $this->testMailData = $testMailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Email From AllPHPTricks.com')
                    ->view('front.contact.notification');
    }

    public function envelope()
    {
        return new Envelope(
            from: new Address('example@example.com', 'Test Sender'),
            subject: 'Test Email',
        );
    }
}
