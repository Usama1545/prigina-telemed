<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppointmentCompleted extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public array $appointment) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Appointment Is Complete – PriGina Global Telemed',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.appointment-completed',
        );
    }
}
