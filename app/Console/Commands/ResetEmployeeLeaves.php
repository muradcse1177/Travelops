<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ResetEmployeeLeaves extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'leaves:reset {--carry-earned=0}';
    protected $description = 'Reset yearly leave balances for all active employees';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $defaults = [
            'casual_leave'   => 12,
            'seek_leave'     => 12,
            'marriage_leave' => 5,
            'fatherhood'     => 5,
            'motherhood'     => 90,
        ];

        $carryEarned = (int)$this->option('carry-earned') === 1;

        DB::transaction(function () use ($defaults, $carryEarned) {
            $update = array_merge($defaults, [
                'earned_leave' => $carryEarned ? DB::raw('earned_leave') : 0,
                'updated_at'   => now(),
            ]);
            DB::table('employees')->where('deleted', 0)->update($update);
        });

        $this->info('Leave balances reset for all active employees.');
        return self::SUCCESS;
    }
}
