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
use Illuminate\Support\Facades\Mail;

class SekertarisController extends Controller
{

    public function index(){
        $doc = Dummy::all();

        return view('pages.pengajuan.admin.index', compact('doc'));
    }

    public function updatePassword(Request $request){
        $request->validate([
            'password' => 'required|confirmed'
        ]);

        $user = User::find($request->id);

        $user->update([
            'password' => bcrypt($request->password)
        ]);

        return ['success' => 'Password Berhasil Diubah!'];
    }

    public function expedited($id): RedirectResponse{

        $data = Dummy::where('doc_group', $id);

        $data->update([
            'doc_status' => 'approved',
            'updated_at' => now()
        ]);

        return redirect()->route('sekretariat.upload.ec', $id)->with(['success' => 'Data Berhasil Diubah!']);

    }

    public function extempted($id){

        $reviewer = User::role('reviewer')->get();

        $doc = Document::join('log_document as ld', 'ld.doc_id', '=', 'document.id')
        ->where('doc_group', $id)->get();

        $dummy = Dummy::where('doc_group', $id)->first();

        return view('pages.pengajuan.assign', compact('doc', 'dummy', 'reviewer'));
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
}
