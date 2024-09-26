<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function indexx(Request $request){
        $selectedOptions = $request->input('review'); // Ini akan menghasilkan array

        // Menggabungkan array menjadi string dengan spasi
        $joinedOptions = User::role('reviewer')->get();

        dd($joinedOptions);
    }

    public function index(){
        // $doc = Document::join('log_document as ld', 'ld.doc_id', '=', 'document.id')
        // ->where('doc_group', 1)->get();
        $review = Submission::find(2);

        $doc = explode(' ', $review->reviewer);

        if($doc){
            return ["data" => $doc,"message" => "Data Berhasil Diambil"];
        }
        return ["message" => "Data Tidak ditemukan"];
    }
}
