<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminStudyAbroadMail extends Mailable
{
    use Queueable, SerializesModels;

    public $application;
    public $user;
    public $company;

    public function __construct($application, $user, $company)
    {
        $this->application = $application;
        $this->user = $user;
        $this->company = $company;
    }

    public function build()
    {
        return $this->subject('🎓 New Study Abroad Application Received')
                    ->view('frontend.emails.admin_study_abroad')
                    ->with([
                        'application' => $this->application,
                        'user' => $this->user,
                        'company' => $this->company,
                    ]);
    }
}
