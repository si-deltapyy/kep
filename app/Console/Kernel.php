<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('cache:clear')->everyMinute();
        $schedule->command('config:cache')->everyMinute();
        $schedule->command('route:cache')->everyMinute();
        $schedule->command('view:clear')->everyMinute();
        $schedule->command('optimize:clear')->everyMinute();
        $schedule->command('optimize')->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
