<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\Document;
use App\Models\Dummy;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SekertarisController extends Controller
{

    public function index(){
        $doc = Dummy::where('sekertaris_id', Auth::id())->get();

        return view('pages.pengajuan.sekertaris.index', compact('doc'));
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
        return redirect()->route('sekertaris.pengajuan.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function extempted($id): RedirectResponse{

        $data = Dummy::find($id);

        $data->update([
            'doc_status' => 'approved',
            'updated_at' => now(),
        ]);

        return redirect()->route('sekretariat.upload.ec', $id)->with(['success' => 'Data Berhasil Diubah!']);

    }

    public function expedited($id){

        $reviewer = User::role('reviewer')->get();

        $doc = Document::join('log_document as ld', 'ld.doc_id', '=', 'document.id')
        ->where('doc_group', $id)->get();

        $dummy = Dummy::where('id', $id)->first();

        return view('pages.pengajuan.sekertaris.assign', compact('doc', 'dummy', 'reviewer'));
    }

    public function all(Request $request, int $id): RedirectResponse{
        $data = Dummy::where('doc_group', $id);
                $doc = Document::join('log_document as ld', 'ld.doc_id', '=', 'document.id')
                ->where('doc_group', $id)
                ->select( '*' , 'ld.id as id_log')
                ->get();

        $data->update([
            'doc_status' => 'on-review',
            'updated_at' => now()
        ]);

        $mailData = [
            'title' => 'Mail from KEP FKIP',
            'body' => 'This is for testing email using smtp.'
        ];

        if ($doc) {
            $reviewer = User::role('reviewer')->get();

            foreach ($doc as $d) {
                foreach ($reviewer as $singleReviewer) {
                    Submission::create([
                        'log_id' => $d->id_log,
                        'reviewer' => $singleReviewer->id,
                        'doc_group' => $id
                    ]);
                }
            }

            foreach ($reviewer as $singleReviewer) {
                $reviewer_email = User::role('reviewer')
                ->where('id', $singleReviewer->id)
                ->select('email')
                ->first();
                Mail::to($reviewer_email->email)->send(new SendMail($mailData));
            }
        }
        return redirect()->route('admin.pengajuan.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * @return Params int
     * Assign Reviewer Untuk Melakukan reviewer Ajuan
     */
     public function upload($id){
        $data = Dummy::where('id', $id)->first();
        $doc = Document::where('doc_group', $id)->first();
        $user = User::find($doc->user_id)->first();

        return view('pages.ec.create', compact('data', 'user', 'id'));
    }
}
