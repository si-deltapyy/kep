<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Template;
use App\Models\TypeAjuan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $temp = Template::with('typeAjuan')->get();
        
        return view('pages.template.index', compact('temp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type = TypeAjuan::all();

        return view('pages.template.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'tempName' => 'required',
            'ajuan' => 'required',
            'tempFile' => 'required|mimes:pdf|max:2048',
        ]);

        $types = TypeAjuan::find($request->ajuan);  // Fetch the same types as used in the view

        if ($request->hasFile('tempFile')) {
            $file = $request->file('tempFile');
            $fileName = 'Template'.'-'. $types->ajuan_name . '-' . $request->tempName . '.' . $file->getClientOriginalExtension();
            $pathDoc = $file->storeAs('/template', $fileName ,['disks' => 'save_upload']); // Simpan di 'storage/app/public/template'

            if ($pathDoc > 0) {// Simpan di 'storage/app/public/template'
                Template::create([
                    'template_name' => $request->tempName,
                    'type_ajuan' => $request->ajuan,
                    'template_path' => $pathDoc,
                ]);
                
                return redirect()->route('admin.template.index');
            }else{
                return redirect()->back()->with('error', 'File not found');
            }
        }else{
            return redirect()->back()->with('error', 'File not found');
        }
        // Simpan data ke database
        

        
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
        $data = Template::find($id);
        $type = TypeAjuan::all();

        return view('pages.template.edit', compact('data', 'type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'tempName' => 'required',
            'ajuan' => 'required',
            'tempFile' => 'mimes:pdf|max:2048',
        ]);

        $types = TypeAjuan::find($request->ajuan);  // Fetch the same types as used in the view

        $temp = Template::find($id);

        if ($request->hasFile('tempFile')) {

            if ($temp->template_path && Storage::disk('save_upload')->exists($temp->template_path)) {
                Storage::disk('save_upload')->delete($temp->template_path);
            }

            $file = $request->file('tempFile');
            $fileName = 'Template'.'-'. $types->ajuan_name . '.' . $file->getClientOriginalExtension();
            $pathDoc = $file->storeAs('/template', $fileName,['disks' => 'save_upload']); // Simpan di 'storage/app/public/template'

            if ($pathDoc > 0) {// Simpan di 'storage/app/public/template'
                $temp->update([
                    'template_name' => $request->tempName,
                    'type_ajuan' => $request->ajuan,
                    'template_path' => $pathDoc,
                ]);
                
                return redirect()->route('admin.template.index');
            }else{
                return redirect()->back()->with('error', 'File not found');
            }
        }else{
            $temp->update([
                'template_name' => $request->tempName,
                'type_ajuan' => $request->ajuan,
            ]);
            return redirect()->route('admin.template.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
