<?php

namespace App\Http\Controllers;

use App\Models\AnswerKuisioner;
use App\Models\Document;
use App\Models\Dummy;
use App\Models\Kuisioner;
use App\Models\LogDocument;
use App\Models\Submission;
use App\Models\Template;
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

        $kuis = AnswerKuisioner::where([
            ['user_id', '=', Auth::user()->id],
            ['kuisioner_status', '=', 'upload']
        ])->count();

        return view('user.dokumen.index', compact('doc', 'kuis'));
    }

    // public function show(){
    //     // $doc = Submission::where('user_id', Auth::user()->id)->with([
    //     //     'user',
    //     //     'logDocument',
    //     //     'document'
    //     // ])->get();

    //     $doc = Dummy::where('user_id', Auth::user()->id)
    //     ->get();

    //     return view('user.dokumen.index', compact('doc'));
    // }

    public function create(){
        $type = TypeDoc::all();

        return view('user.dokumen.create', compact('type'));
    }

    public function show(Int $id){
        $doc = Document::join('log_document as ld', 'ld.doc_id', '=', 'document.id')
        ->where('doc_group', $id)->get();
        $dummy = Dummy::where('id', $id)
        ->get();


        return view('user.dokumen.detail', compact('doc', 'dummy'));
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
                $docu = Document::create([
                    'user_id' => Auth::user()->id,
                    'doc_name' => 'berkas-'.$group.'-'.$x->name.'-'.Auth::user()->name,
                    'doc_path' => $pathDoc,
                    'doc_type' => $type ,
                    'doc_group' => $group,
                    'ajuan_type' => 2, // Save the doc type based on the Type model
                ]);
            }
        }

        Dummy::create([
            'title' => $request->pengusul,
            'doc_group' => $group,
            'user_id' => Auth::user()->id,
            'doc_status' => 'new-proposal'
        ]);

        return redirect()->route('user.ajuan.index');
    }


    public function destroy($id)
    {
        $doc = Document::find($id);

        if($doc){

            Storage::delete('public/document/'.$doc->doc_name);
            $doc->delete();

            return redirect()->route('user.ajuan.index')->with('success', 'Document berhasil dihapus');
        } else {
            return redirect()->route('user.ajuan.index')->with('error', 'Document tidak ditemukan');
        }
    }

    public function template(){

        $temp = Template::all();

        return view('user.dokumen.template', compact('temp'));
    }
}
