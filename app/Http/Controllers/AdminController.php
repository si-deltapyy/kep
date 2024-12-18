<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Document;
use App\Models\Dummy;
use App\Models\LogDocument;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    //
    public function index(){
        $doc = Dummy::all();

        $sekertaris = User::role('sekertaris')->get();

        return view('pages.pengajuan.admin.index', compact('doc', 'sekertaris'));
    }



    /**
     * @return Params
     * Show Data Ajuan detail
     */
    public function assign(Int $id){

        $sekertaris = User::role('sekertaris')->get();

        $doc = Document::join('log_document as ld', 'ld.doc_id', '=', 'document.id')
        ->where('doc_group', $id)->get();

        $data = Dummy::where('id', $id)->first();

        $num = [
            'sek1' => Dummy::where('sekertaris_id', 5)->count(),
            'sek2' => Dummy::where('sekertaris_id', 6)->count(),
            'sek3' => Dummy::where('sekertaris_id', 7)->count(),
        ];

        return view('pages.pengajuan.admin.assign', compact('doc', 'data', 'sekertaris', 'num'));
    }

    public function store(Request $request){
        $doc = Dummy::find($request->id);

        $doc->update([
            'sekertaris_id' => $request->sekertaris,
            'doc_status' => 'process',
            'doc_flag' => 'Waiting'
        ]);

        return redirect()->route('admin.pengajuan.index');
    }
}
