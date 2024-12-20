<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\TypeDoc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeDokumenController extends Controller
{
    public function index()
    {
        $dokumen = TypeDoc::all();
        return view('pages.manage.dokumen.index', compact('dokumen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('pages.manage.dokumen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $ajuan = TypeDoc::create([
            'name' => $request->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('superadmin.typedokumen.index')->with([
            'success' => 'Data Berhasil Ditambahkan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $typedokumen = TypeDoc::find($id);
        return view('pages.manage.dokumen.edit', compact('typedokumen'));
    }

    /**
     * Update the specified resource in storage.
     */
        public function update(Request $request, $id)
    {
        $typedokumen = TypeDokumen::findOrFail($id);

        $request->validate([
            'name' => 'required',
        ]);

        $typedokumen->name = $request->name;
        $typedokumen->save();

        return redirect()->route('superadmin.typedokumen.index')->with('success', 'Typedokumen updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dokumen = TypeDoc::find($id);
        $dokumen->delete();
        return redirect()->back();
    }
}
