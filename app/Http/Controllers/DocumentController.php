<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use ZipArchive;
use App\Models\Logs;
use App\Models\User;
use App\Models\Dummy;
use App\Models\Payment;
use App\Models\TypeDoc;
use App\Models\Document;
use App\Models\Template;
use App\Models\AjuanType;
use App\Models\Kuisioner;
use App\Models\TypeAjuan;
use App\Models\Submission;
use PHPUnit\Event\TypeMap;
use App\Models\LogDocument;
use Illuminate\Http\Request;
use App\Models\AnswerKuisioner;
use App\Models\ProfileUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use ZanySoft\Zip\Facades\Zip;


class DocumentController extends Controller
{

    public function index(){
        $doc = Dummy::where('user_id', Auth::user()->id)
        ->get();

        $kuis = AnswerKuisioner::where([
            ['user_id', '=', Auth::user()->id],
            ['kuisioner_status', '=', 'upload']
        ])->count();

        $types = TypeAjuan::with('template')->get();

        return view('pages.dokumen.index', compact('doc', 'kuis', 'types'));
    }

    public function create(){
        $type = TypeDoc::all();
        $ajuan = TypeAjuan::all();

        return view('pages.dokumen.user.create', compact('type', 'ajuan'));
    }

    public function show(Int $id){
        $doc = Document::join('log_document as ld', 'ld.doc_id', '=', 'document.id')
        ->join('ajuan_type as at', 'at.id', '=', 'document.ajuan_type')
        ->where('doc_group', $id)->first();
        $dummy = Dummy::where('id', $id)
        ->get();

        $logs = Logs::where('doc_group', $id)->orderBy('created_at', 'desc')->get();


        return view('pages.dokumen.show', compact('doc', 'dummy', 'logs'));
    }


    public function store(Request $request){


        $types = TypeDoc::all();  // Fetch the same types as used in the view

        $validator = Validator::make($request->all(), [
            'pengusul' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.ajuan.index')->with('error', 'Judul belum diinputkan!');
        }

        Dummy::create([
            'title' => $request->pengusul,
            'user_id' => Auth::user()->id,
            'doc_status' => 'new-proposal',
            'sekertaris_id' => null,
        ]);
        Logs::create([
            'title' => 'Pengajuan Dokumen Baru',
            'description' => 'Dokumen Berhasil Diunggah, Menunggu Konfirmasi Admin',
            'action_label' => 'Upload Success',
            'action_link' => route('user.ajuan.index'),
            'doc_group' => Dummy::orderBy('id', 'desc')
                ->pluck('id')
                ->first() ?? 0,
        ]);
        $group = Dummy::orderBy('id', 'desc')
                ->pluck('id')
                ->first() ?? 0;
        foreach ($types as $x) {
            // Dynamically construct the input name (e.g., 'doc1', 'doc2', etc.)
            $inputName = 'doc' . $x->id;
            // Check if the request has this file
            if ($request->hasFile($inputName)) {
                // Validate the uploaded file
                $request->validate([
                    $inputName => 'required|mimes:pdf|max:2048',
                ]);

                $type = $x->id;
                // Handle the file upload
                $file = $request->file($inputName);
                $fileName = Auth::user()->name.'_'.$x->name .'_'. $group .'.' . $file->getClientOriginalExtension();
                $pathDoc = $file->storeAs('/document', $fileName,['disks' => 'save_upload']); // Menggunakan timestamp untuk nama unik

                // Save file information in the database
                $docu = Document::create([
                    'user_id' => Auth::user()->id,
                    'doc_name' => 'berkas-'.$group.'-'.Auth::user()->name . '-' . $x->name,
                    'doc_path' => $pathDoc,
                    'doc_type' => $type ,
                    'doc_group' => $group,
                    'ajuan_type' => $request->typeajuan, // Save the doc type based on the Type model
                ]);

            }
        }
        return redirect()->route('user.ajuan.index')->with('success', 'Pengajuan Dokumen Telah Berhasil');
    }

    public function edit($id)
    {
        // Ambil data dokumen berdasarkan ID
        $draft = Dummy::findOrFail($id);
        $documentsTemp = $draft->Document;
        // Ambil daftar tipe dokumen dan ajuan
        $types = TypeDoc::all();
        $ajuan = TypeAjuan::all();
        $document = [];
        foreach ($types as $x) {
            $document[$x->id] = $documentsTemp->firstWhere('doc_type', $x->id);
        }

        return view('pages.dokumen.user.update', compact('draft','document', 'types', 'ajuan'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang masuk (tanpa memaksa unggah file)
        $request->validate([
            'pengusul' => 'required|string|max:255',
            'typeajuan' => 'required|integer',
        ]);

        $types = TypeDoc::all();
        $draft = Dummy::findOrFail($id);
        $group = $draft->id;
        $documentsTemp = $draft->Document;
        $updated = false;
        foreach ($types as $x) {
            $document = $documentsTemp->firstWhere('doc_type', $x->id);
            if (isset($document)) { //Kalau ada, file lama di hapus, upload file baru
                $inputName = 'doc' . $x->id;
                $document->update([
                    'doc_name' => 'berkas-'.$document->doc_group.'-'.Auth::user()->name . '-' . $x->name,
                    'ajuan_type' => $request->typeajuan,
                ]);
                if ($request->hasFile($inputName)) {
                    $request->validate([
                        $inputName => 'required|mimes:pdf|max:2048',
                    ]);
                    if (!empty($document->doc_path)){ //Kalau ada hapus dulu filenya yang lama
                        $res = Storage::disk('save_upload')->delete($document->doc_path);
                    }
                    $file = $request->file($inputName);
                    $fileName = Auth::user()->name . '_' . $x->name . '_' . $document->doc_group . '.' . $file->getClientOriginalExtension();
                    $pathDoc = $file->storeAs('/document', $fileName,['disks' => 'save_upload']);
                    $document->update([
                        'doc_path' => $pathDoc,
                    ]);
                    $updated = true;
                }
            } else { //Kalau ga ada, buat baru
                $inputName = 'doc' . $x->id;
                if ($request->hasFile($inputName)) {
                    $request->validate([
                        $inputName => 'required|mimes:pdf|max:2048',
                    ]);
                    $file = $request->file($inputName);
                    $fileName = Auth::user()->name . '_' . $x->name . '_' . $group . '.' . $file->getClientOriginalExtension();
                    $pathDoc = $file->storeAs('/document', $fileName,['disks' => 'save_upload']);
                    Document::create([
                        'user_id' => Auth::user()->id,
                        'doc_name' => 'berkas-'.$group.'-'.Auth::user()->name . '-' . $x->name,
                        'doc_path' => $pathDoc,
                        'doc_type' => $x->id,
                        'doc_group' => $group,
                        'ajuan_type' => $request->typeajuan, // Save the doc type based on the Type model
                    ]);
                    $updated = true;
                }
            }
        }
        // Jika tidak ada file yang diupdate, tetap beri pesan sukses
        if (!$updated) {
            return redirect()->route('user.ajuan.index')->with('success', 'Dokumen diperbarui tanpa perubahan file.');
        }

        return redirect()->route('user.ajuan.index')->with('success', 'Dokumen berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $doc = Document::find($id);
        if($doc){
            Storage::delete('public/document/'.$doc->doc_name);
            $doc->delete();
            return redirect()->route('user.ajuan.index')->with('success', 'Document berhasil dihapus');
        } else {
            return redirect()->route('user.ajuan.index')->with('error', 'Document tidak ditemukan');
        }
    }

    public function viewDocument($path)
    {
        $file = Storage::disk('public')->get($path);
        return response($file, 200)
            ->header('Content-Type', 'application/pdf');
    }

    /*
    //Download Template as ZiP
    */
    public function downloadZip($type)
    {
        // Ambil data ajuan berdasarkan type
        $ajuan = AjuanType::find($type);

        if (!$ajuan) {
            return back()->with('error', 'Jenis ajuan tidak ditemukan.');
        }

        // Ambil semua template yang sesuai dengan type_ajuan
        $templates = Template::where('type_ajuan', $type)->get();

        if ($templates->isEmpty()) {
            return back()->with('error', "Belum ada template untuk ajuan {$ajuan->ajuan_name}.");
        }

        // Simpan ZIP di `public/storage/`
        $zipFileName = "templates_type_{$type}.zip";
        $zipPath = public_path("app/{$zipFileName}");

        // Buat ZIP baru
        $zip = \ZanySoft\Zip\Facades\Zip::create($zipPath);

        foreach ($templates as $template) {
            $filePath = public_path("app/{$template->template_path}");

            if (file_exists($filePath)) {
                $zip->add($filePath);
            }
        }

        $zip->close();

        // Kirim ZIP ke user
        return response()->download($zipPath)->deleteFileAfterSend(true);
    }
}
