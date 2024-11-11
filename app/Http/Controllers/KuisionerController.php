<?php

namespace App\Http\Controllers;

use App\Models\AnswerKuisioner;
use App\Models\Kuisioner;
use App\Models\TypeAjuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KuisionerController extends Controller
{
    /**
     * @param index
     */
    public function index(){
        $index = Kuisioner::all();

        return view('user.kuisioner.index', compact('index'));
    }

    /**
     * @param Request
     */
    public function store(Request $request){

        $types = Kuisioner::all();

        foreach ($types as $x) {
            // Dynamically construct the input name (e.g., 'doc1', 'doc2', etc.)
            $inputName = 'kuis' . $x->id;
            $ans = AnswerKuisioner::create([
                'user_id' => Auth::user()->id,
                'kuisioner_id' => $x->id,
                'kuisioner' => $request->$inputName
            ]);
        }

        return redirect()->route('user.ajuan.create');
    }
}
