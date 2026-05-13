<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudyAbroadMail extends Mailable
{
    use Queueable, SerializesModels;

    public $application;
    public $user;
    public $defaultPassword;
    public $company;

    /**
     * Create a new message instance.
     */
    public function __construct($application, $user, $defaultPassword, $company)
    {
        $this->application = $application;
        $this->user = $user;
        $this->defaultPassword = $defaultPassword;
        $this->company = $company;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('🎓 Study Abroad Application Confirmation')
                    ->view('frontend.emails.study_abroad')
                    ->with([
                        'application' => $this->application,
                        'user' => $this->user,
                        'defaultPassword' => $this->defaultPassword,
                        'company' => $this->company,
                    ]);
    }
}
