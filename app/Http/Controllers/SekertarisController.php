<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use App\Models\Dummy;
use App\Mail\SendMail;
use App\Models\Document;
use App\Models\ECDocument;
use App\Models\Submission;
use App\Service\PricingService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Ajuan;
use App\Models\Logs;
use App\Models\Reviewer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;


class SekertarisController extends Controller
{
    protected $pricingService;

    public function __construct(PricingService $pricingService){
        $this->pricingService = $pricingService;
    }

    public function index(){
        $doc = Dummy::where('sekertaris_id', Auth::id())->get();

        if ($doc->isEmpty()) {
            // Jika $doc kosong, ambil tindakan (misalnya, kembalikan pesan error)
            return redirect()->back()->with('error', 'Belum ada dokumen yang diajukan Masuk.');
        }

        // Ambil ID dari $doc jika tidak kosong
        $docGroup = $doc->map(function ($item) {
            return $item->id;
        });

        // Query hanya akan dijalankan jika $docGroup tidak kosong
        $ajuan = Dummy::with(['document.ajuanType']) // Load relasi 'documents' dan 'ajuanType'
        ->where('sekertaris_id', Auth::id())
        ->get();

        // $ajuan2 = Dummy::with('firstDocument.ajuanType') // Load firstDocument dan relasi ajuanType
        // ->where('sekertaris_id', Auth::id()) // Filter berdasarkan sekertaris_id
        // ->get();

            // return $reviewer;

        return view('pages.pengajuan.sekertaris.index', compact('ajuan'));
    }

    /**
     * @return Params
     * Show Data Ajuan detail
     */
    public function show(Int $id){

        $doc = Document::join('log_document as ld', 'ld.doc_id', '=', 'document.id')
        ->where('doc_group', $id)->get();

        $dummy = Dummy::where('id', $id)->get();
        $dums = Dummy::where('id', $id)->first();

        return view('pages.pengajuan.sekertaris.show', compact('doc', 'dummy', 'dums'));
    }

    public function updatePassword(Request $request): RedirectResponse{

        $id = Auth::user()->id; // Get the authenticated user id
        $user = User::find($id);

        $request->validate([
            'password' => 'required|min:8|regex:/[0-9]/|regex:/[a-z]/',
        ], [
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password harus memiliki minimal 8 karakter.',
            'password.regex' => 'Password harus mengandung angka dan huruf kecil.',
        ]);


        $user->update([
            'password' => bcrypt($request->password)
        ]);

        $user->save();

        $user->revokePermissionTo('update-password');
        $user->givePermissionTo('done-password');

        return redirect()->route('dashboard');
    }

    /**
     * @return Params int
     * @return RedirectRespons
     */
    public function update(Request $request, int $id): RedirectResponse{

        $data = Dummy::where('id', $id);
        $doc = Document::join('log_document as ld', 'ld.doc_id', '=', 'document.id')
                ->where('doc_group', $id)
                ->select( '*' , 'ld.id as id_log')
                ->get();

        $data->update([
            'doc_status' => 'on-review',
            'doc_flag' => 'Progress',
        ]);


        $mailData = [
            'title' => 'Mail from KEP FKIP',
            'body' => 'This is for testing email using smtp.',
            'subject' => 'Review Bos',
            'view' => 'pages.email.sendReviewer',
            'link' => 'reviewer/pengajuan',
        ];

        if ($doc) {
            $reviewer = $request->input('review');

            foreach ($doc as $d) {
                foreach ($reviewer as $singleReviewer) {
                    Submission::create([
                        'log_id' => $d->id_log,
                        'reviewer' => $singleReviewer,
                        'doc_group' => $id
                    ]);
                }
            }

            foreach ($reviewer as $singleReviewer) {
                $reviewer_email = User::role('reviewer')
                ->where('id', $singleReviewer)
                ->select('email')
                ->first();
                Mail::to($reviewer_email->email)->send(new SendMail($mailData));
            }
        }
        Logs::create([
            'title' => 'Accepted',
            'description' => 'Dokumen anda sesuai, dokumen akan segera diproses Secara Langsung (Khusus)',
            'action_label' => 'Dokumen Valid',
            'action_link' => '',
            'doc_group' => $id,
        ]);
        $this->pricingService->executePayment($data->user_id, $data->id);//bayar
        return redirect()->route('sekertaris.pengajuan.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function extempted($id): RedirectResponse{

        $data = Dummy::find($id);

        $data->update([
            'doc_status' => 'approved',
            'updated_at' => now(),
        ]);

        Logs::create([
            'title' => 'Accepted',
            'description' => 'Dokumen anda sesuai, dokumen akan segera diproses Secara Langsung (Khusus)',
            'action_label' => 'Dokumen Valid',
            'action_link' => '',
            'doc_group' => $id,
        ]);
        $this->pricingService->executePayment($data->user_id, $data->id);//bayar
        return redirect()->route('sekertaris.upload.ec', $id)->with(['success' => 'Data Berhasil Diubah!']);

    }

    public function expedited($id){

        $reviewer = User::role('reviewer')->get();

        $doc = Document::join('log_document as ld', 'ld.doc_id', '=', 'document.id')
        ->where('doc_group', $id)->get();

        $dummy = Dummy::where('id', $id)->first();

        return view('pages.pengajuan.sekertaris.assign', compact('doc', 'dummy', 'reviewer'));
    }

    public function all($id)
    {
        return $this->expedited($id);
    }

    /*
    public function all($id): RedirectResponse{
        $data = Dummy::where('id', $id);
        $doc = Document::join('log_document as ld', 'ld.doc_id', '=', 'document.id')
                ->where('doc_group', $id)
                ->select( '*' , 'ld.id as id_log')
                ->get();

        $data->update([
            'doc_status' => 'on-review',
            'updated_at' => now()
        ]);

        $idtype = $doc->map(function ($item) {
            return $item->ajuan_type;
        });


        $mailData = [
            'title' => 'Mail from KEP FKIP',
            'body' => 'This is for testing email using smtp.',
            'subject' => 'a',
            'view' => 'pages.email.sendReviewer',
            'link' => 'reviewer/pengajuan',
        ];

        if ($doc) {
            $typeRev = Reviewer::where('type', 1)->get();
            $idRev = $typeRev->map(function ($item) {
                return $item->user_id;
            });
            $reviewer = User::whereIn('id', $idRev)->get();

            foreach ($doc as $d) {
                foreach ($reviewer as $singleReviewer) {
                    Submission::create([
                        'log_id' => $d->id_log,
                        'reviewer' => $singleReviewer->id,
                        'doc_group' => $id
                    ]);
                }
            }

            Logs::create([
                'title' => 'Accepted',
                'description' => 'Dokumen anda sesuai, dokumen akan segera diproses reviewer',
                'action_label' => 'Dokumen Valid',
                'action_link' => '',
                'doc_group' => $id,
            ]);

            foreach ($reviewer as $singleReviewer) {
                $reviewer_email = User::role('reviewer')
                ->where('id', $singleReviewer->id)
                ->select('email')
                ->first();
                Mail::to($reviewer_email->email)->send(new SendMail($mailData));
            }
        }
        $this->pricingService->executePayment($data->user_id, $data->id);//bayar
        return redirect()->route('sekertaris.pengajuan.index')->with(['success' => 'Dokumen berhasil diberikan ke reviewer bidang terkait!']);
    }
    */

    /**
     * @return Params int
     * Assign Reviewer Untuk Melakukan reviewer Ajuan
     */

    public function rejected($id): RedirectResponse{

        $data = Dummy::find($id);
        $user = User::find($data->user_id);

        $data->update([
            'doc_status' => 'disapproved',
            'doc_flag' => 'Done',
            'updated_at' => now(),
        ]);

        Logs::create([
            'title' => 'Dokumen Tidak Sesuai',
            'description' => 'Dokumen yang diajukan belum sesuai dengan ketentuan yang berlaku',
            'action_label' => 'Ajuan Ditolak',
            'action_link' => '',
            'doc_group' => $id,
        ]);

        Logs::create([
            'title' => 'Proses selesai',
            'description' => 'Dokumen yang diajukan telah selesai diproses',
            'action_label' => 'Ajuan Selesai',
            'action_link' => '',
            'doc_group' => $id,
        ]);

        $mailData = [
            'title' => 'Dokumen Tidak Sesuai',
            'body' => 'Rejected Request Ethical Clearance Document',
            'subject' => 'datamu ditolak ayo ajukan lagi',
            'view' => 'pages.email.sendReviewer',
            'link' => 'user/Ajuan',
        ];
        Mail::to($user->email)->send(new SendMail($mailData));
        //gak bayar
        return redirect()->route('sekertaris.pengajuan.index')->with(['success' => 'Dokumen telah berhasil ditolak!']);
    }

    public function upload(Request $request, $id)
    {
        // Ambil data
        $data = Dummy::find($id);
        $doc = Document::where('doc_group', $id)->first();

        if (!$doc) {
            return redirect()->back()->with('error', 'Dokumen tidak ditemukan.');
        }

        $user = User::find($doc->user_id);

        // update ec_proceed_at di tabel Dummy biar bisa mencantumkan tanggal di surat
        if ($request->isMethod('post')) {
            $document = Dummy::find($id);

            $document->ec_proceed_at = Carbon::now();
            $document->save();

            return redirect()->route('sekertaris.upload.ec', $id)->with('success', 'Tanggal proceed_at berhasil diperbarui.');
        }

        return view('pages.ec.create', compact('data', 'user', 'id'));
    }

}
