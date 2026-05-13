<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        // Yearly leave reset (already exists)
        $schedule->command('leaves:reset')
            ->timezone(config('app.timezone'))
            ->yearlyOn(1, 1, '00:01')
            ->withoutOverlapping()
            ->evenInMaintenanceMode();

        // ==============================================
        // 🔥 Email Queue Processor (RUNS EVERY MINUTE)
        // ==============================================
        $schedule->command('emails:process')
            ->timezone(config('app.timezone'))
            ->everyMinute()
            ->withoutOverlapping()
            ->evenInMaintenanceMode();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
