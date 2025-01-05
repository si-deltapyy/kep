<?php

namespace App\Http\Controllers\SuperAdmin;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\ManagementModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ManageWebsiteController extends Controller
{
        public function update(Request $request)
        {
            // Validasi input
            $validator = Validator::make($request->all(), [
                'start_maintenance' => 'required|date',
                'end_maintenance' => 'required|date|after_or_equal:start_maintenance',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => $validator->errors()->first(),
                ], 422);
            }

            try {
                $maintenance = ManagementModel::findOrFail(1);

                // Update kolom maintenance
                $maintenance->maintenance_start = $request->start_maintenance;
                $maintenance->maintenance_finish = $request->end_maintenance;

                $maintenance->save();

                return redirect()->back()->with('success', 'Jadwal Maintenance berhasil diperbarui!');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Gagal memperbarui jadwal maintenance: ' . $e->getMessage());
        }
        }


        //Buat check maintenance berapa hari lagi => implementasi di Landing Page
        public function checkMaintenance(): JsonResponse
        {
            $maintenance = ManagementModel::find(1);

            if ($maintenance && $maintenance->maintenance_start) {
                $diffInDays = Carbon::now()->diffInDays(Carbon::parse($maintenance->maintenance_start), false);

                return response()->json([
                    'show_modal' => $diffInDays >= 0 && $diffInDays <= 3,
                    'message' => $diffInDays >= 0 && $diffInDays <= 3
                        ? 'Maintenance will start in less than 3 days.'
                        : 'Maintenance is not imminent.',
                    'maintenance_start' => Carbon::parse($maintenance->maintenance_start)->toIso8601String(),
                    'maintenance_finish' => $maintenance->maintenance_finish
                        ? Carbon::parse($maintenance->maintenance_finish)->toIso8601String()
                        : 'Not specified',
                ]);
            }

            return response()->json([
                'show_modal' => false,
                'message' => 'No maintenance schedule found.',
                'maintenance_start' => null,
                'maintenance_finish' => null,
            ]);
        }
}
