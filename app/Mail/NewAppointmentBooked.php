<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewAppointmentBooked extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public array $appointment) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Booking Confirmed – Your Appointment Request Has Been Received',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.new-appointment',
        );
    }
}
