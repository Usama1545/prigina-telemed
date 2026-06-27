<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $verificationLink
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Verify Your Email – PriGina Global Telemed',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.email-verification',
        );
    }
}
