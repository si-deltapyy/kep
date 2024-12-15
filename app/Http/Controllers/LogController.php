<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function indexx(Request $request){
        // $selectedOptions = $request->input('review'); // Ini akan menghasilkan array

        // // Menggabungkan array menjadi string dengan spasi
        // $joinedOptions = User::role('reviewer')->get();

        // dd($joinedOptions);
        $file = $request->file('upload');
        $fileName = $file->getClientOriginalExtension();
        if($file->storeAs('document', 'berkas-'. '.' .$fileName, 'public')){
            return ["message" => "Data Berhasil Diambil"];
        }else{
            return ["message" => "Data Gagal Diambil"];
        }
    }

    public function index(){
        // // $doc = Document::join('log_document as ld', 'ld.doc_id', '=', 'document.id')
        // // ->where('doc_group', 1)->get();
        // $review = Submission::find(2);

        // $doc = explode(' ', $review->reviewer);

        // if($doc){
        //     return ["data" => $doc,"message" => "Data Berhasil Diambil"];
        // }
        // return ["message" => "Data Tidak ditemukan"];

        return view('user.tes');
    }
}
