<?php

namespace App\Http\Controllers;

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

        $user = User::all();

        // return $profile;

        return view('dashboard', compact('profile', 'user'));
    }
}
