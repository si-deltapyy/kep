<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Dummy;
use App\Models\LogDocument;
use App\Models\Submission;
use App\Models\TypeDoc;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Event\TypeMap;

class DocumentController extends Controller
{

    public function index(){
        $doc = Dummy::where('user_id', Auth::user()->id)
        ->get();

        return view('user.dokumen.index', compact('doc'));
    }

    public function show(){
        // $doc = Submission::where('user_id', Auth::user()->id)->with([
        //     'user',
        //     'logDocument',
        //     'document'
        // ])->get();

        $doc = Dummy::where('user_id', Auth::user()->id)
        ->get();

        return view('user.dokumen.index', compact('doc'));
    }

    public function create(){
        $type = TypeDoc::all();

        return view('user.dokumen.create', compact('type'));
    }

    public function detail($ajuan){
        $doc = Document::join('log_document as ld', 'ld.doc_id', '=', 'document.id')
        ->where('doc_group', $ajuan)->get();

        return view('user.dokumen.detail', compact('doc'));
    }


    public function store(Request $request){


        $types = TypeDoc::all();  // Fetch the same types as used in the view

        $group = Document::orderBy('doc_group', 'desc')
                ->pluck('doc_group')
                ->first();
        $group++;

        foreach ($types as $x) {
            // Dynamically construct the input name (e.g., 'doc1', 'doc2', etc.)
            $inputName = 'doc' . $x->id;

            // Check if the request has this file
            if ($request->hasFile($inputName)) {
                // Validate the uploaded file
                $request->validate([
                    $inputName => 'required|mimes:doc,docx,pdf|max:2048',
                ]);

                $type = $x->id;

                // Handle the file upload
                $file = $request->file($inputName);
                $fileName = Auth::user()->name.'_'.$x->name .'.' . $file->getClientOriginalExtension(); // Menggunakan timestamp untuk nama unik
                $pathDoc = $file->storeAs('document', $fileName, 'public'); // Store the file in the 'public/documents' directory

                // Save file information in the database
                Document::create([
                    'user_id' => Auth::user()->id,
                    'doc_name' => 'berkas-'.$group.'/'.$x->name.'-'.Auth::user()->name,
                    'doc_path' => $pathDoc,
                    'doc_type' => $type ,
                    'doc_group' => $group, // Save the doc type based on the Type model
                ]);
            }
        }

        Dummy::create([
            'title' => $request->pengusul,
            'doc_group' => $group,
            'user_id' => Auth::user()->id,
            'doc_status' => 'new-proposal'
        ]);

        return redirect()->intended(route('ajuan.index'));
    }


    public function destroy($id)
    {
        $doc = Document::find($id);

        if($doc){

            Storage::delete('public/document/'.$doc->doc_name);
            $doc->delete();

            return redirect()->route('ajuan.index')->with('success', 'Document berhasil dihapus');
        } else {
            return redirect()->route('ajuan.index')->with('error', 'Document tidak ditemukan');
        }
    }
}
