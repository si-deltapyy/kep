<?php

namespace App\Http\Controllers;

use App\Models\ECDocument;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ECDocumentController extends Controller
{

    public function index(){

        $doc = ECDocument::all();

        return view('pages.ec.index', compact('doc'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        // Simpan file ke penyimpanan
        $file = $request->file('file');
        $fileName = 'Dokumen EC'.'-'. $request->name .'-'. now() . '.' . $file->getClientOriginalExtension();
        $pathDoc = $file->storeAs('ecDocument', $fileName, 'public'); // Simpan di 'storage/app/public/ec_documents'

        // Simpan data ke database
        ECDocument::create([
            'user_id' => $request->user,
            'title' => $request->title,
            'doc_name' => $fileName,
            'doc_path' => $pathDoc,
            'doc_group' => $request->id
        ]);

        return redirect()->route('sekertaris.ec.index');
    }

}
