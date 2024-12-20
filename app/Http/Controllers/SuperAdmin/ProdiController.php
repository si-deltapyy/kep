<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodi = Prodi::all();
        return view('pages.manage.prodi.index', compact('prodi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('pages.manage.prodi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'prodi_kode' => 'required',
        ]);

        $prodi = Prodi::create([
            'name' => $request->name,
            'prodi_kode' => $request->prodi_kode,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('superadmin.prodi.index')->with([
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

        $prodi = Prodi::find($id);
        return view('pages.manage.prodi.edit', compact('prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodi $prodi)
    {
        $request->validate([
            'name' => 'required',
            'prodi_kode' => 'required',
        ]);

        $prodi->name = $request->name;
        $prodi->prodi_kode = $request->prodi_kode;

        $prodi->save();

        return redirect()->route('superadmin.prodi.index')->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prodi = Prodi::find($id);
        $prodi->delete();
        return redirect()->back();
    }
}
