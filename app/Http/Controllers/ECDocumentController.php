<?php

namespace App\Http\Controllers;

use App\Models\Dummy;
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

        // Simpan file ke penyimpanan
        $fileName = 'Dokumen EC-' . $request->name . '-' . now()->format('Y-m-d-H-i-s') . '.pdf';
        // Simpan data ke database

        $doc = ECDocument::updateOrCreate([
            //Cek apakah dokumen sudah diproses
            'doc_group' => $request->id
        ],
        [
            'user_id' => $request->user,
            'title' => $request->title,
            'doc_name' => $fileName,
            'doc_group' => $request->id
        ]);


        Dummy::find($request->id)->update([
            'doc_status' => 'approved',
            'doc_flag' => 'EC Process'
        ]);

        if (Auth::role('sekertaris')) {
            // Validasi khusus untuk pengguna dengan role 'kppm'
            $request->validate([
                'file' => 'required|mimes:pdf|max:2048'
            ]);

            if ($request->hasFile('file')) {
                // Simpan file ke penyimpanan
                $file = $request->file('file');
                $fileName = 'Dokumen EC-' . $request->name . '-' . now()->format('Y-m-d-H-i-s') . '.pdf';
                $pathDoc = $file->storeAs('ecDocument', $fileName, 'public');

                // Update kolom `doc_path` jika role adalah 'kppm'
                $doc->doc_path = $pathDoc;
                $doc->save();
            }
        }

        return redirect()->route('sekertaris.ec.index');
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
        'tanggal' => $doc->Dummy->proceed_at ?? '......',
    ];

    $pdf = Pdf::loadView('pages.ec.preview', ['data' => $data])
        ->setOption('isRemoteEnabled', true)
        ->setOption('enable_remote', true);

    return $pdf->download('dokumen-ec.pdf');
}


}
