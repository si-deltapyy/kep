<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class MaintenanceScheduler extends Command
{
    protected $signature = 'maintenance:schedule';
    protected $description = 'Manage application maintenance mode based on settings table';

    public function handle()
    {
        Log::info('⚙️ Maintenance Scheduler Running...');

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
        Log::info('🔧 is_down: ' . ($maintenance->is_down ? 'true' : 'false'));

        // ✅ Kondisi 1: Jika waktu sudah mencapai start_maintenance dan belum dalam mode down
        if (!$maintenance->is_down && $now->greaterThanOrEqualTo($start) && $now->lessThan($finish)) {
            Log::info('🔒 Entering Maintenance Mode...');
            try {
                Artisan::call('down', [
                    '--secret' => 'unique-secret-key-123'
                ]);
                DB::table('management')->where('id', 1)->update(['is_down' => true]);
                Log::info('✅ Application is now in maintenance mode. is_down set to true.');
            } catch (\Exception $e) {
                Log::error('❌ Failed to enter maintenance mode: ' . $e->getMessage());
            }
        }
        // ✅ Kondisi 2: Jika waktu sudah lewat finish_maintenance
        elseif ($now->greaterThanOrEqualTo($finish) && $maintenance->is_down) {
            Log::info('⏰ Exiting Maintenance Mode...');
            try {
                Artisan::call('up');
                DB::table('management')->where('id', 1)->update(['is_down' => false]);
                Log::info('✅ Application is now live. is_down set to false.');
            } catch (\Exception $e) {
                Log::error('❌ Failed to exit maintenance mode: ' . $e->getMessage());
            }
        }
        // ✅ Kondisi 3: Jika di luar jadwal maintenance, pastikan is_down reset
        elseif (!$now->between($start, $finish) && $maintenance->is_down) {
            Log::info('⏳ Resetting Maintenance Mode...');
            try {
                Artisan::call('up');
                DB::table('management')->where('id', 1)->update(['is_down' => false]);
                Log::info('✅ Application forced back to live. is_down reset to false.');
            } catch (\Exception $e) {
                Log::error('❌ Forced reset failed: ' . $e->getMessage());
            }
        } else {
            Log::info('ℹ️ No action taken. Current time does not match any maintenance window.');
        }
    }

    private function isApplicationDown()
    {
        return file_exists(storage_path('framework/down'));
    }
}
