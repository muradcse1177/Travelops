<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerPaymentSuccessMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $order;
    public $passwordNotice;

    public function __construct($user, $order, $passwordNotice)
    {
        $this->user = $user;
        $this->order = $order;
        $this->passwordNotice = $passwordNotice;
    }

    public function build()
    {
        return $this->subject('Payment Successful')
            ->view('frontend.emails.customer-payment-success'); // ✅ NEW VIEW
    }
}
