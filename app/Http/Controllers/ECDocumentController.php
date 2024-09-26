<?php

namespace App\Http\Controllers;

use App\Models\ECDocument;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ECDocumentController extends Controller
{
    
    public function index(){

        $doc = ECDocument::all();

        return view('pages.ec.index', compact('doc'));
    }

    public function store(Request $request): RedirectResponse{

        return redirect()->route();
    }
}
