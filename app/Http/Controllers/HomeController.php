<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Dummy;
use App\Models\ProfileUser;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $profile = ProfileUser::where('user_id', Auth::user()->id)->with([
            'prodi'
        ])->first();

        $user = Dummy::where('user_id', Auth::user()->id)->get();
        $jumlahAjuan = Dummy::where('doc_status', 'new-proposal')
        ->count();

        $jumlahReq = User::role('user')
        ->whereHas('permissions', function ($query) {
            $query->where('name', 'waiting-acception');
        })
        ->count();

        $jumlahUser = User::role('sekertaris')->count();
        $jumlahOnReview = Dummy::whereNotIn('doc_status', ['new-proposal', 'approved'])->count();
        $jumOnRevSek = Dummy::whereNotIn('doc_status', ['new-proposal', 'approved'])
        ->where('sekertaris_id', Auth::id())->count();
        $jumDone = Dummy::where('doc_status', 'approved')->count();

        $newProposal = Dummy::whereIn('doc_status', ['new-proposal'])->count();
        $newProposalSek = Dummy::where('doc_status', 'new-proposal')->
        where('sekertaris_id', Auth::user()->id)->count();

        return view('dashboard', 
            compact(
                'profile', 'user', 'jumlahAjuan', 'jumlahUser', 
                'jumlahReq', 'jumlahOnReview', 'newProposal', 
                'newProposalSek', 'jumDone', 'jumOnRevSek'));
    }
}
