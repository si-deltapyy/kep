<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Document;
use App\Models\Dummy;
use App\Models\LogDocument;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    //
    public function index(){
        $doc = Dummy::all();

        return view('pages.pengajuan.admin.index', compact('doc'));
    }

    /**
     * @return Params int
     * Assign Reviewer Untuk Melakukan reviewer Ajuan
     */

    

    public function upload($id){
        $data = Dummy::where('doc_group', $id)->first();
        $doc = Document::where('doc_group', $id)->first();
        $user = User::find($doc->user_id)->first();

        return view('pages.ec.create', compact('data', 'user', 'id'));
    }


    /**
     * @return Params int
     * @return RedirectRespons
     */
    public function update(Request $request, int $id): RedirectResponse{

        $data = Dummy::where('doc_group', $id);
                $doc = Document::join('log_document as ld', 'ld.doc_id', '=', 'document.id')
                ->where('doc_group', $id)
                ->select( '*' , 'ld.id as id_log')
                ->get();

        // switch($code){
        //     case 1:
        //         $data->update([
        //             'doc_status' => 'approved',
        //             'updated_at' => now()
        //         ]);
        //         return redirect()->route('sekretariat.pengajuan.index')->with(['success' => 'Data Berhasil Diubah!']);
        //         break;

        //     case 2:
                $data->update([
                    'doc_status' => 'on-review',
                    'updated_at' => now()
                ]);

                $mailData = [
                    'title' => 'Mail from KEP FKIP',
                    'body' => 'This is for testing email using smtp.'
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
                return redirect()->route('admin.pengajuan.index')->with(['success' => 'Data Berhasil Diubah!']);
            //     break;

            // case 3:
            //     $data->update([
            //         'doc_status' => 'on-review',
            //         'updated_at' => now()
            //     ]);

            //     $mailData = [
            //         'title' => 'Mail from KEP FKIP',
            //         'body' => 'This is for testing email using smtp.'
            //     ];

            //     if ($doc) {
            //         $reviewer = User::role('reviewer')->get();

            //         foreach ($doc as $d) {
            //             foreach ($reviewer as $singleReviewer) {
            //                 Submission::create([
            //                     'log_id' => $d->id_log,
            //                     'reviewer' => $singleReviewer->id,
            //                     'doc_group' => $id
            //                 ]);
            //             }
            //         }

            //         foreach ($reviewer as $singleReviewer) {
            //             $reviewer_email = User::role('reviewer')
            //             ->where('id', $singleReviewer->id)
            //             ->select('email')
            //             ->first();
            //             Mail::to($reviewer_email->email)->send(new SendMail($mailData));
            //         }
            //     }
            //     return redirect()->route('sekretariat.pengajuan.index')->with(['success' => 'Data Berhasil Diubah!']);
            //     break;

        // }
    }

    /**
     * @return Params
     * Show Data Ajuan detail
     */
    // public function show(Int $id){

    //     $doc = Document::join('log_document as ld', 'ld.doc_id', '=', 'document.id')
    //     ->where('doc_group', $id)->get();

    //     $dummy = Dummy::where('id', $id)->get();
    //     $dums = Dummy::where('id', $id)->first();

    //     return view('pages.pengajuan.admin.show', compact('doc', 'dummy', 'dums'));
    // }

    /**
     * @return Params
     * Show Data Ajuan detail
     */
    public function assign(Int $id){

        $sekertaris = User::role('sekertaris')->get();

        $doc = Document::join('log_document as ld', 'ld.doc_id', '=', 'document.id')
        ->where('doc_group', $id)->get();

        $data = Dummy::where('id', $id)->first();

        return view('pages.pengajuan.admin.assign', compact('doc', 'data', 'sekertaris'));
    }
}