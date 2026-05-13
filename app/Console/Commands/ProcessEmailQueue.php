<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Jobs\SendQueuedEmail;

class ProcessEmailQueue extends Command
{
    protected $signature = 'emails:process';
    protected $description = 'Process pending emails from email_queue table';

    public function handle()
    {
        // Fetch pending emails (batch size ≤ 50)
        $pendingEmails = DB::table('email_queue')
            ->where('status', 0)
            ->orderBy('id', 'asc')
            ->limit(50)
            ->get();

        if ($pendingEmails->isEmpty()) {
            $this->info("No pending emails.");
            return;
        }

        foreach ($pendingEmails as $mail) {

            // Company loaded for branding + CC
            $company = DB::table('users')
                ->where('id', $mail->agent_id)
                ->first();

            // Dispatch Job
            SendQueuedEmail::dispatch([
                'id'         => $mail->id,
                'email'      => $mail->email,
                'subject'    => $mail->subject,
                'message'    => $mail->message,
                'attachment' => $mail->attachment,
                'company'    => $company,
            ]);
        }

        $this->info($pendingEmails->count() . " emails dispatched.");
    }
}
