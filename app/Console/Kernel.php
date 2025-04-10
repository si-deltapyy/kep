<?php

namespace App\Console;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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
        // $schedule->command('cache:clear')->everyMinute();
        // $schedule->command('view:clear')->everyMinute();
        // $schedule->command('config:clear')->everyMinute();
        // $schedule->command('optimize')->everyMinute();
        $schedule->command('maintenance:start')
        ->everyMinute()
        ->withoutOverlapping()
        ->onOneServer()
        ->runInBackground()
        ->appendOutputTo(storage_path('logs/maintenance_start.log'));

        $schedule->command('maintenance:end')
            ->everyMinute()
            ->withoutOverlapping()
            ->onOneServer()
            ->runInBackground()
            ->appendOutputTo(storage_path('logs/maintenance_end.log'));

        $schedule->command('maintenance:reset')
            ->everyMinute()
            ->withoutOverlapping()
            ->onOneServer()
            ->runInBackground()
            ->appendOutputTo(storage_path('logs/maintenance_reset.log'));
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
