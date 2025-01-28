<?php

namespace App\Http\Controllers;

use App\Models\Kppm;
use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Dummy;
use App\Models\ECDocument;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KppmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doc = ECDocument::all();
        $usDoc = ECDocument::where('user_id', Auth::id())->first();
        $docs = Dummy::where('doc_status', 'approved')->get();

        return view('pages.ec.index', compact('doc', 'docs', 'usDoc'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fileEc' => 'required|mimes:pdf|max:2048',
        ]);

        $ec = ECDocument::where('doc_group',$request->id);
        // Storage::delete($ec->doc_path);

        $file = $request->file('fileEc');
        $filename = 'EC (KPPM-Signed)' . now() . '.' . $file->getClientOriginalExtension();
        $pathDoc = $file->store('ecDocument');

        $ec->update([
            'ec_status' => 'Signed',
            'doc_path' => $pathDoc,
            'doc_name' => $filename,
        ]);

        return redirect()->route('kppm.pengajuan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Dummy::where('id', $id)->first();
        $doc = Document::where('doc_group', $id)->first();
        $user = User::find($doc->user_id)->first();

        return view('pages.ec.update', compact('data', 'user', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kppm $kppm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kppm $kppm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kppm $kppm)
    {
        //
    }
}
