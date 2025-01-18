<?php

namespace App\Http\Controllers;

use App\Models\Dummy;
use App\Models\ECLog;
use App\Models\Document;
use App\Models\ECDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ECDocumentController extends Controller
{

    public function index(){

        $doc = ECDocument::all();
        $usDoc = ECDocument::where('user_id', Auth::id())->first();
        $docs = Dummy::where('doc_status', 'approved')->get();

        return view('pages.ec.index', compact('doc', 'docs', 'usDoc'));
    }

    public function store(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $fileName = 'Dokumen EC-' . $request->name . '-' . now()->format('Y-m-d-H-i-s') . '.pdf';
        if ($user->hasRole('sekertaris')) {
            // Simpan file ke penyimpanan

            // Simpan data ke database
            $doc = ECDocument::updateOrCreate(
                [
                    // Cek apakah dokumen sudah diproses
                    'doc_group' => $request->id
                ],
                [
                    'user_id' => $request->user,
                    'title' => $request->title,
                    'doc_name' => $fileName,
                    'doc_group' => $request->id,
                    'ec_status' => 'Waiting Sign KPPM',
                ]
            );

            Dummy::find($request->id)->update([
                'doc_status' => 'approved',
                'doc_flag' => 'EC Process'
            ]);

            return redirect()->route('sekertaris.ec.index')->with('success', 'Dokumen berhasil disimpan!');
        } elseif ($user->hasRole('kppm')) {
            // Validasi khusus untuk pengguna dengan role 'kppm'
            $request->validate([
                'fileEc' => 'required|mimes:pdf|max:2048'
            ]);

            if ($request->hasFile('fileEc')) {
                // Simpan file ke penyimpanan
                $file = $request->file('fileEc');
                $fileName = 'Dokumen EC-' . $request->name . '-' . now()->format('Y-m-d-H-i-s') . '.pdf';
                $pathDoc = $file->storeAs('/ecDocument', $fileName);

                // Update kolom `doc_path` jika role adalah 'kppm'
                $doc = ECDocument::where('doc_group', $request->id)->first();
                if ($doc) {
                    $doc->doc_path = $pathDoc;
                    $doc->ec_status = 'Signed';
                    $doc->save();

                    return redirect()->back()->with('success', 'Dokumen berhasil diunggah dan disimpan!');
                } else {
                    return redirect()->back()->with('error', 'Dokumen tidak ditemukan.');
                }
            } else {
                // Jika tidak ada file yang diunggah, kembalikan redirect dengan pesan error
                return redirect()->back()->with('error', 'File tidak ditemukan.');
            }
        } else {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk melakukan tindakan ini.');
        }
    }


    public function publish($id): RedirectResponse
    {
        $doc = ECDocument::find($id);
        $doc->update([
            'ec_status' => 'Distribute'
        ]);

        $user = User::find($doc->user_id);

        $mailData = [
            'title' => 'Dokumen EC anda telah terbit',
            'body' => 'Silahkan unduh dokumen EC anda di link berikut.',
            'subject' => 'Ethical Clerance Document Published',
            'view' => 'pages.email.sendUser',
            'link' => 'user/ECDokumen',
        ];

        Mail::to($user->email)->send(new SendMail($mailData));

        return redirect()->route('admin.ec.index');
    }

    public function signKPPM(Request $request, $id): RedirectResponse
    {
        $doc = ECDocument::find($id);
        $request->validate([
            'ethical_number' => 'required|string'
        ]);
        $doc->update([
            'ec_status' => 'Process',
            'ethical_number' => $request->ethical_number,
        ]);



        return redirect()->route('admin.ec.index');
    }

    public function update($id)
    {

    }

    //Preview Role Sekertaris
    public function show($id)
    {
        $doc = Document::find($id);

        $data = [
            'nama' => $doc->User->name ?? 'Tidak ada nama pengguna',
            'judul' => $doc->Dummy->title ?? 'Tidak ada judul dokumen',
            'tanggal' => Carbon::now()->translatedFormat('j F, Y'),
        ];


        $pdf = Pdf::loadView('pages.ec.preview', ['data' => $data])
            ->setOption('isRemoteEnabled', true)
            ->setOption('enable_remote', true);

        return $pdf->stream('dokumen-ec.pdf');
    }


    //Preview Khusus Role Admin dan KPPM
    public function previewPDF($id)
    {
        $doc = ECDocument::find($id);
        $data = [
            'nama' => $doc->User->name ?? 'Tidak ada nama pengguna',
            'judul' => $doc->Dummy->title ?? 'Tidak ada judul dokumen',
            'ethical_number' => $doc->ethical_number ?? 'Ethical Number Belum Terbit',
            'signed_date' => $doc->signed_at ?? '......',
            'tanggal' => $doc->Dummy->ec_proceed_at ?? '......',
        ];

        $pdf = Pdf::loadView('pages.ec.preview', ['data' => $data])
            ->setOption('isRemoteEnabled', true)
            ->setOption('enable_remote', true);

            return $pdf->stream('dokumen-ec.pdf');
    }

    public function downloadPDF($id)
    {
        $doc = ECDocument::find($id);
        $doc->signed_at = Carbon::now();
        $doc->save();
        $data = [
            'nama' => $doc->User->name ?? 'Tidak ada nama pengguna',
            'judul' => $doc->Dummy->title ?? 'Tidak ada judul dokumen',
            'ethical_number' => $doc->ethical_number ?? 'Ethical Number Belum Terbit',
            'signed_date' => $doc->signed_at ?? '......',
            'tanggal' => $doc->Dummy->ec_proceed_at ?? '......',
        ];

        $pdf = Pdf::loadView('pages.ec.preview', ['data' => $data])
            ->setOption('isRemoteEnabled', true)
            ->setOption('enable_remote', true);

        return $pdf->download('dokumen-ec.pdf');
    }


    public function log($id)
    {
        $document = ECDocument::find($id);
        $dummy = Dummy::where('id', $document->doc_group)->get();
        $logs = ECLog::where('ec_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Tambahkan atribut log untuk setiap entri
        $logAttributes = $logs->map(function ($log) {
            return [
                'title' => $this->getLogTitle($log),
                'description' => $this->getLogDescription($log),
                'badge' => $this->getLogBadge($log),
            ];
        });

        return view('pages.ec.logs-show', compact('dummy', 'logs', 'logAttributes'));
    }

    /**
     * Setting for ECLog View
     */
    /**
     * Generate title based on log status.
     */
    private function getLogTitle($log)
    {
        switch ($log->new_status) {
            case 'Waiting Sign KPPM':
                return '<h3 class="text-sm font-medium text-yellow-500 dark:text-yellow-400">
                            Persetujuan Tanda Tangan KPPM
                        </h3>';
            case 'Signed':
                return '<h3 class="text-sm font-medium text-green-500 dark:text-green-400">
                            Dokumen Telah Ditandatangani
                        </h3>';
            case 'Process':
                return '<h3 class="text-sm font-medium text-blue-500 dark:text-blue-400">
                            Dokumen Sedang Diproses
                        </h3>';
            case 'Distributed':
                return '<h3 class="text-sm font-medium text-purple-500 dark:text-purple-400">
                            Dokumen Telah Didistribusikan
                        </h3>';
            default:
                return '<h3 class="text-sm font-medium text-gray-800 dark:text-gray-100">
                            Status Tidak Dikenal
                        </h3>';
        }
    }

    /**
     * Generate description based on log status.
     */
    private function getLogDescription($log)
    {
        switch ($log->new_status) {
            case 'Waiting Sign KPPM':
                return '<p class="text-sm text-yellow-600 mt-2 dark:text-yellow-300">
                            Dokumen sedang menunggu tanda tangan dari KPPM. Pastikan prosesnya berjalan lancar.
                        </p>';
            case 'Signed':
                return '<p class="text-sm text-green-600 mt-2 dark:text-green-300">
                            Dokumen telah berhasil ditandatangani. Langkah berikutnya dapat dilakukan sesuai prosedur.
                        </p>';
            case 'Process':
                return '<p class="text-sm text-blue-600 mt-2 dark:text-blue-300">
                            Dokumen saat ini sedang dalam proses. Harap tunggu hingga selesai.
                        </p>';
            case 'Distributed':
                return '<p class="text-sm text-purple-600 mt-2 dark:text-purple-300">
                            Dokumen telah didistribusikan ke pihak terkait. Terima kasih atas kerja sama Anda.
                        </p>';
            default:
                return '<p class="text-sm text-gray-600 mt-2 dark:text-gray-300">
                            Status dokumen tidak dikenal. Harap periksa kembali atau hubungi administrator.
                        </p>';
        }
    }


    /**
     * Generate badge based on log status.
     */
    private function getLogBadge($log)
    {
        switch ($log->new_status) {
            case 'Waiting Sign KPPM':
                return '<span class="bg-yellow-500/10 text-yellow-500 text-[11px] font-medium px-2.5 py-0.5 rounded flex items-center">
                            <i data-lucide="hourglass" class="w-4 h-4 mr-1"></i> Waiting Sign KPPM
                        </span>';
            case 'Signed':
                return '<span class="bg-green-500/10 text-green-500 text-[11px] font-medium px-2.5 py-0.5 rounded flex items-center">
                            <i data-lucide="check-check" class="w-4 h-4 mr-1"></i> Signed
                        </span>';
            case 'Process':
                return '<span class="bg-blue-500/10 text-blue-500 text-[11px] font-medium px-2.5 py-0.5 rounded flex items-center">
                            <i data-lucide="refresh-cw" class="w-4 h-4 mr-1"></i> Process
                        </span>';
            case 'Distributed':
                return '<span class="bg-purple-500/10 text-purple-500 text-[11px] font-medium px-2.5 py-0.5 rounded flex items-center">
                            <i data-lucide="send" class="w-4 h-4 mr-1"></i> Distributed
                        </span>';
            default:
                return '<span class="bg-gray-500/10 text-gray-500 text-[11px] font-medium px-2.5 py-0.5 rounded flex items-center">
                            <i data-lucide="help-circle" class="w-4 h-4 mr-1"></i> Unknown Status
                        </span>';
        }
    }



}
