<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Dummy;
use App\Models\ProfileUser;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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
        $perbaikan = Dummy::where('doc_status', ['revised', 'resubmission'])->count();

        $newProposal = Dummy::whereIn('doc_status', ['new-proposal'])->count();
        $newProposalSek = Dummy::where('doc_status', 'new-proposal')->
        where('sekertaris_id', Auth::user()->id)->count();


        //Table
        $userReq = User::role('user')
        ->whereHas('permissions', function ($query) {
            $query->where('name', 'waiting-acception');
        })
        ->paginate(5);

        $ajuan = Dummy::paginate(5);

        //graph
        $RevGraph = Dummy::select(DB::raw('MONTH(created_at) as month, COUNT(*) as total'))
            ->whereNotIn('doc_status', ['new-proposal', 'approved'])
            ->where('sekertaris_id', Auth::id())
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();

        $data = array_fill(1, 12, 0);

        foreach ($RevGraph as $row) {
            $data[$row->month] = $row->total;
        }

        // Format data untuk ApexCharts
        $series = [
            [
                'name' => 'Orders',
                'data' => array_values($data), // Ambil nilai bulan 1-12
            ]
        ];



        return view('dashboard',
            compact(
                'profile', 'user', 'jumlahAjuan', 'jumlahUser',
                'jumlahReq', 'jumlahOnReview', 'newProposal',
                'newProposalSek', 'jumDone', 'jumOnRevSek', 'userReq', 'ajuan', 'series', 'perbaikan'));
    }
}
