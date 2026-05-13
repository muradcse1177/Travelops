<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendQueuedEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $id          = $this->data['id'];
        $email       = $this->data['email'];
        $subject     = $this->data['subject'];
        $messageBody = $this->data['message'];
        $attachments = json_decode($this->data['attachment'], true); 
        $company     = $this->data['company'];
        \Log::info("Queue Executed for ID: ".$this->data['id']);
        try {

            Mail::send('email.dynamicTemplate', [
                'messageBody' => $messageBody,
                'company'     => $company
            ], function ($message) use ($email, $subject, $attachments, $company) {

                // DEFAULT FROM (.env → Mailer)
                $message->from(
                    config('mail.from.address'),
                    config('mail.from.name')
                );

                // MAIN RECEIVER
                $message->to($email);

                // CC to company email (if exists)
                if (!empty($company->company_email)) {
                    $message->cc($company->company_email);
                }

                // SUBJECT
                $message->subject($subject);

                // MULTIPLE ATTACHMENTS
                if (!empty($attachments) && is_array($attachments)) {
                    foreach ($attachments as $file) {
                        $path = public_path($file);
                        if (file_exists($path)) {
                            $message->attach($path);
                        }
                    }
                }
            });

            // UPDATE QUEUE STATUS
            DB::table('email_queue')
                ->where('id', $id)
                ->update([
                    'status'     => 1,
                    'updated_at' => now()
                ]);

        } catch (\Exception $e) {

            // LOG THE ERROR IF MAIL FAILS
            Log::error("Email Sending Failed (Queue #$id): " . $e->getMessage());

            // Keep status = 0 (so next cron try again)
        }
    }
}
