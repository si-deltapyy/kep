<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class ResetMaintenanceCommand extends Command
{
    protected $signature = 'maintenance:reset';
    protected $description = 'Reset maintenance mode if is_down is still true outside the maintenance window';

    public function handle()
    {
        \DB::reconnect();
        \DB::purge('mysql');
        Log::info('⏳ Reset Maintenance Command Running...');

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

        if (!$now->between($start, $finish) && $maintenance->is_down) {
            Log::info('⏳ Resetting Maintenance Mode...');
            try {
                Artisan::call('up');
                DB::table('management')->where('id', 1)->update(['is_down' => false]);
                Log::info('✅ Application forced back to live. is_down reset to false.');
            } catch (\Exception $e) {
                Log::error('❌ Failed to reset maintenance mode: ' . $e->getMessage());
            }
        } else {
            Log::info('ℹ️ Reset condition not met. No action taken.');
        }
    }
}
