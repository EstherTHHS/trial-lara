<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    protected $inquiry;
    public function __construct($inquiry)
    {
        $this->inquiry = $inquiry;
    }



    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function build()
    {
        return $this->subject('Email Notification from Inquiry')
            ->view('email.inquiry')
            ->with([
                'title' => $this->inquiry->title,
                'email' => $this->inquiry->email,
                'description' => $this->inquiry->description
            ]);
    }
}
