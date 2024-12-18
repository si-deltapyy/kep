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
        $sub = Submission::where('reviewer', Auth::id())->with(
                'logDocument',
                'Dummy',
            )->first();
        $doc = Document::where('doc_group', $sub->doc_group)->get();

        return view('pages.review.index', compact('doc', 'sub'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
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
