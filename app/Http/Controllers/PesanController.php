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

        // Ambil role pengguna
        $currentUserRole = Auth::user()->getRoleNames()->first();
        $data = Dummy::when($currentUserRole === 'sekretaris', function ($query) use ($currentUserId) {
            // Jika pengguna adalah sekretaris, tambahkan kondisi `is_review`
            return $query->where('sekertaris_id', $currentUserId)->where('is_review', 1);
        })->get();

        return view('pages.pesan.index', compact('data'));
    }

    public function edit($id){
        $submission = Submission::find($id);

        return view('pages.pesan.sekertaris.show', compact('submission'));
    }


}
