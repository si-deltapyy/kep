<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocRevController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subs = Submission::where('reviewer', Auth::id())->with(
                'logDocument',
                'Dummy',
            )->get();

        $doc = Document::where('doc_group', $subs[0]['doc_group'])->get();
        dd($doc[1]['doc_path']);

        return view('pages.review.index', compact('doc', 'sub'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function feedback(Int $id){

        $sub = Submission::where('reviewer', $id)->with(
            'log_id',
            'doc_group',
            'log_id.doc_id',
        )->where('reviewer_status', 'in review')
        ->first();

        return [$sub];
        return view('pages.review.message', compact('sub'));
    }


    public function pils($id)
    {
        $doc = Document::where('doc_group', $id)->with('Dummy')->get();
        // $sub = Submission::where('reviewer', Auth::id())->with(
        //             'logDocument',
        //             'Dummy',
        //         )->where('reviewer_status', 'in review')
        //         ->get();


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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $doc = Document::find($id);
        // dd($doc['doc_path']);
        return view('pages.pengajuan.reviewer.detail', compact('doc'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update Status Review dokumen tanpa mengirim feedback
     */
    public function update(Request $request, $id)
    {

        // Validasi input
        $validated = $request->validate([
            'doc_id' => 'required|integer|exists:submission,log_id',
        ]);

        // Lakukan update pada tabel Submission
        $updated = Submission::where('log_id', $validated['doc_id'])
            ->where('reviewer', Auth::id())
            ->update(['reviewer_status' => 'done']);

        // Periksa apakah data berhasil diperbarui
        if ($updated) {
            return redirect()->back()->with('success', 'Dokumen berhasil diperbarui!');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui dokumen. Pastikan Anda memiliki akses yang sesuai.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
