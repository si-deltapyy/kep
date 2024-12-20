<?php

namespace App\Http\Controllers;

use App\Models\Dummy;
use App\Models\ECDocument;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        // Simpan file ke penyimpanan
        $file = $request->file('file');
        $fileName = 'Dokumen EC'.'-'. $request->name .'-'. now() . '.' . $file->getClientOriginalExtension();
        $pathDoc = $file->storeAs('ecDocument', $fileName); // Simpan di 'storage/app/public/ec_documents'

        // Simpan data ke database
        ECDocument::create([
            'user_id' => $request->user,
            'title' => $request->title,
            'doc_name' => $fileName,
            'doc_path' => 'ecDocument/'.$fileName,
            'doc_group' => $request->id
        ]);

        Dummy::find($request->id)->update([
            'doc_status' => 'approved',
            'doc_flag' => 'EC Process'
        ]);

        return redirect()->route('sekertaris.ec.index');
    }

    public function publish($id): RedirectResponse
    {
        $doc = ECDocument::find($id);
        $doc->update([
            'ec_status' => 'Distribute'
        ]);

        return redirect()->route('admin.ec.index');
    }

    public function signKPPM($id): RedirectResponse
    {
        $doc = ECDocument::find($id);
        $doc->update([
            'ec_status' => 'Process'
        ]);

        return redirect()->route('admin.ec.index');
    }

    public function update($id)
    {

    }

    public function show($id)
    {

    }

}
