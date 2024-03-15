<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->from('haruharo.ee@gmail.com')
                    ->subject('お客様からのお問い合わせ')
                    ->view('emails.contact')
                    ->with([
                        'data' => $this->data,
                    ]);
    }
}