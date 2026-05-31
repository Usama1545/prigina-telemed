<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReviewRequest extends Mailable
{
    use Queueable, SerializesModels;

    public string $reviewUrl;
    public string $invoiceUrl;

    public function __construct(public array $appointment)
    {
        $this->reviewUrl  = url('/' . $appointment['id'] . '/review');
        $this->invoiceUrl = url('/patient/appointment/' . $appointment['id'] . '/invoice');
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'How was your appointment? Leave a review',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.review-request',
        );
    }
}
