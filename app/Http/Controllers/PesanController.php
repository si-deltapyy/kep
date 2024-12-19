<?php

namespace App\Http\Controllers;

use App\Models\Dummy;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    //Sekertaris Index
    public function index(){

        $currentUserId = Auth::id();
        $data = Dummy::where('sekertaris_id', $currentUserId)->get();

        return view('pages.pesan.index', compact('data'));
    }

    public function edit($id){
        $submission = Submission::find($id);

        return view('pages.pesan.sekertaris.show', compact('submission'));
    }


}
