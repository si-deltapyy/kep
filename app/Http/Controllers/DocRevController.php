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
        $doc = Document::where('doc_group', $id)->get();
        $sub = Submission::where('reviewer', Auth::id())->with(
                    'logDocument',
                    'Dummy',
                )->where('reviewer_status', 'in review')
                ->get();

        return view('pages.review.index', compact('doc', 'sub'));
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
