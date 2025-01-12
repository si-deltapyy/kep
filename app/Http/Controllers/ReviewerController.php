<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Dummy;
use App\Models\LogDocument;
use App\Models\Logs;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewerController extends Controller
{
    public function index(){

        $id = Submission::select('doc_group')->where('reviewer', Auth::id());
        $doc = Dummy::whereIn('id', $id)->get();


        return view('pages.pengajuan.reviewer.index', compact('doc'));
    }

    public function show(Int $id){
        $doc = Document::where('doc_group', $id)->get();
        // $sub = Submission::where('reviewer', Auth::id())->with(
        //         'logDocument',
        //         'Dummy',
        //     )->get();

        $sub = Dummy::find($id);

        $sub->update([
            'doc_flag' => 'In Review',
        ]);

        Submission::where('doc_group', $sub->id)
          ->where('reviewer', Auth::id())
          ->where('reviewer_status', 'process')
          ->update(['reviewer_status' => 'in review']);


        Logs::create([
            'title' => 'Review Dokumen',
            'description' => 'Dokumen anda sedang direview oleh pihak reviewer KEP FKIP UNS',
            'action_label' => 'Proses Review',
            'action_link' => '',
            'doc_group' => $id,
        ]);

        //Cek apakah semua dokumen telah direview
        $docGroupId = $doc->first()->doc_group;
        $allDone = Submission::where('doc_group', $docGroupId)
        ->where('reviewer', auth()->id())
        ->get()
        ->every(function ($submission) {
            return $submission->reviewer_status === 'done';
        });

        //Variabel untuk cek reviewer_status di view

        $submissionStatuses = Submission::whereIn('log_id', $doc->pluck('id'))
        ->where('reviewer', auth()->id())
        ->get()
        ->pluck('reviewer_status', 'log_id');


        return view('pages.review.index', compact('doc', 'submissionStatuses', 'id', 'allDone'));
    }

    /**
     * @param Int Request
     */
    public function assign(Request $request, Int $doc){

    }

    /**
     * @param Request
     * @return RedirectRespons
     */
    public function store(Request $request): RedirectResponse{


        return redirect()->route('reviewer.pengajuan.show')->with(['success' => 'Berhasil Upload']);
    }

    public function destroy(Int $doc){

    }


    public function finishReview($dummyId)
{
    // Temukan dummy berdasarkan ID
    $dummy = Dummy::find($dummyId);

    // Pastikan data dummy ditemukan
    if (!$dummy) {
        return redirect()->back()->with('error', 'Data not found.');
    }

    // Langsung perbarui review_status menjadi selesai (1)
    $dummy->doc_flag = 'Feedback Review';
    $dummy->review_status = 1;
    $dummy->save();

    // Redirect ke halaman reviewer index dengan pesan sukses
    return redirect()->route('reviewer.pengajuan.index')->with('success', 'Review finished successfully.');
}




}
