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
        // Ambil semua data reviewer dari submission
        // $data = Submission::join('log_document as ld', 'ld.id' , '=', 'submission.log_id')
        //     ->join('document as dc', 'dc.id', '=', 'ld.doc_id')
        //     ->join('dummy as dm', 'dm.doc_group', '=', 'dc.doc_group')
        //     ->where('reviewer', Auth::user()->id)->get();

        $doc = Submission::join('log_document as ld', 'ld.id', '=', 'submission.log_id')
            ->join('document as dc', 'dc.id', '=', 'ld.doc_id')
            ->join('dummy as dm', 'dm.doc_group', '=', 'dc.doc_group')
            ->where('reviewer', Auth::user()->id) // Pastikan 'reviewer' berasal dari tabel yang benar
            ->select('dm.title', 'dm.created_at', 'dm.doc_group') // Misalnya, jika ingin menghitung total per grup
            ->groupBy('dm.title', 'dm.created_at', 'dm.doc_group') // Gunakan alias tabel untuk menghindari ambiguitas
            ->get();


        //     $reviewer_email = User::role('reviewer')
        //             ->where('id', 3)
        //             ->select('email')
        //             ->first();

        // return response()->json([
        //     'data' => $reviewer_email->email,
        //     'user' => Auth::user()->id,
        //     'message' => 'Bukan id kamu'
        // ]);

        return view('reviewer.ajuan.index', compact('doc'));
    }

    public function show(Int $id){
        $doc = Document::where('doc_group', $id)->get();

        return view('reviewer.ajuan.show', compact('doc'));
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
