<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class StartMaintenanceCommand extends Command
{
    protected $signature = 'maintenance:start';
    protected $description = 'Activate maintenance mode if the current time matches the start time';

    public function handle()
    {

        \DB::reconnect();
        \DB::purge('mysql');

        Log::info('🔒 Start Maintenance Command Running...');


        $maintenance = DB::table('management')->find(1);

        if (!$maintenance) {
            Log::error('❌ No maintenance settings found.');
            return;
        }

        $now = Carbon::now();
        $start = Carbon::parse($maintenance->maintenance_start);
        $finish = Carbon::parse($maintenance->maintenance_finish);

        Log::info('🕒 Current Time: ' . $now);
        Log::info('📅 Start Time: ' . $start);
        Log::info('📅 Finish Time: ' . $finish);

        if (!$maintenance->is_down && $now->greaterThanOrEqualTo($start) && $now->lessThan($finish)) {
            Log::info('🔒 Entering Maintenance Mode...');
            try {
                Artisan::call('down', ['--secret' => 'unique-secret-key-123']);
                DB::table('management')->where('id', 1)->update(['is_down' => true]);
                Log::info('✅ Application is now in maintenance mode. is_down set to true.');
            } catch (\Exception $e) {
                Log::error('❌ Failed to enter maintenance mode: ' . $e->getMessage());
            }
        } else {
            Log::info('ℹ️ Start condition not met. No action taken.');
        }
    }
}
