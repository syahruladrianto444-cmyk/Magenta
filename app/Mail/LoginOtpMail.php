<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LoginOtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $otp;
    public string $userName;
    public string $ipAddress;
    public string $userAgent;

    public function __construct(string $otp, string $userName, string $ipAddress, string $userAgent)
    {
        $this->otp = $otp;
        $this->userName = $userName;
        $this->ipAddress = $ipAddress;
        $this->userAgent = $userAgent;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Kode Verifikasi Login - MAGENTA Admin',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.login-otp',
        );
    }
}
