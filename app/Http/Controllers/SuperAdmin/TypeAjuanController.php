<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\TypeAjuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeAjuanController extends Controller
{
    public function index()
    {
        $ajuan = TypeAjuan::all();
        return view('pages.manage.ajuan.index', compact('ajuan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('pages.manage.ajuan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ajuan_name' => 'required',
        ]);

        $ajuan = TypeAjuan::create([
            'ajuan_name' => $request->ajuan_name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('superadmin.typeajuan.index')->with([
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

        $typeajuan = TypeAjuan::find($id);
        return view('pages.manage.ajuan.edit', compact('typeajuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeAjuan $typeajuan)
    {
        $request->validate([
            'ajuan_name' => 'required',
        ]);

        $typeajuan->ajuan_name = $request->ajuan_name;

        $typeajuan->save();

        return redirect()->route('superadmin.typeajuan.index')->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ajuan = TypeAjuan::find($id);
        $ajuan->delete();
        return redirect()->back();
    }
}
