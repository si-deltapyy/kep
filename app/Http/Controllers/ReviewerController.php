<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Dummy;
use App\Models\LogDocument;
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
        
        return view('pages.pengajuan.reviewer.show', compact('doc'));
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
}
