<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class EndMaintenanceCommand extends Command
{
    protected $signature = 'maintenance:end';
    protected $description = 'Deactivate maintenance mode if the current time matches the end time';

    public function handle()
    {
        Log::info('⏰ End Maintenance Command Running...');

        \DB::reconnect();
        \DB::purge('mysql'); // Pastikan koneksi di-refresh

        $maintenance = DB::table('management')->find(1);

        if (!$maintenance) {
            Log::error('❌ No maintenance settings found.');
            return;
        }

        $now = Carbon::now();
        $finish = Carbon::parse($maintenance->maintenance_finish);

        Log::info('🕒 Current Time: ' . $now);
        Log::info('📅 Finish Time: ' . $finish);

        if ($now->greaterThanOrEqualTo($finish) && $maintenance->is_down) {
            Log::info('⏰ Exiting Maintenance Mode...');
            try {
                Artisan::call('up');
                DB::table('management')->where('id', 1)->update(['is_down' => false]);
                Log::info('✅ Application is now live. is_down set to false.');
            } catch (\Exception $e) {
                Log::error('❌ Failed to exit maintenance mode: ' . $e->getMessage());
            }
        } else {
            Log::info('ℹ️ End condition not met. No action taken.');
            Log::info('🔧 is_down: ' . ($maintenance->is_down ? 'true' : 'false'));
        }
    }

}
