<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ServiceLeadMail extends Mailable
{
    use Queueable, SerializesModels;

    public $lead;
    public $company;
    public $subjectLine;

    public function __construct($lead, $company, $subjectLine)
    {
        $this->lead = $lead;
        $this->company = $company;
        $this->subjectLine = $subjectLine;
    }

    public function build()
    {
        return $this->subject($this->subjectLine)
            ->view('email.servicelead')
            ->with([
                'lead' => $this->lead,
                'company' => $this->company
            ]);
    }
}

