<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Dummy;
use App\Models\LogDocument;
use App\Models\Logs;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewerController extends Controller
{
    public function index(){

        $id = Submission::select('doc_group')->where('reviewer', Auth::id());
        $doc = Dummy::whereIn('id', $id)->get();
        
        
        return view('pages.pengajuan.reviewer.index', compact('doc'));
    }

    public function show(Int $id): RedirectResponse{
        $doc = Document::where('doc_group', $id)->get();
        // $sub = Submission::where('reviewer', Auth::id())->with(
        //         'logDocument',
        //         'Dummy',
        //     )->get();

        $dum = Dummy::find($id);
        $sub = Submission::where('doc_group', $id)->get();

        $dum->update([
            'doc_flag' => 'In Review',
        ]);

        $sub->update([
            'reviewer_status' => 'In Review',
        ]);

        Logs::create([
            'title' => 'Review Dokumen',
            'description' => 'Dokumen anda sedang direview oleh pihak reviewer KEP FKIP UNS',
            'action_label' => 'Proses Review',
            'action_link' => '',
            'doc_group' => $id,
        ]);
        
        return redirect()->route('reviewer.pengajuan.index')->with(['success' => 'Dokumen siap untuk direview. Silahkan berikan feedback']);
    }

    /**
     * @param Int Request
     */
    public function assign(Request $request, Int $doc){

    }

    /**
     * @param Request
     * @return RedirectRespons
     */
    public function store(Request $request): RedirectResponse{


        return redirect()->route('reviewer.pengajuan.show')->with(['success' => 'Berhasil Upload']);
    }

    public function destroy(Int $doc){

    }

    public function updatePassword(Request $request): RedirectResponse{

        $id = Auth::user()->id; // Get the authenticated user id
        $user = User::find($id);

        $request->validate([
            'password' => 'required|min:8|regex:/[0-9]/|regex:/[a-z]/',
        ], [
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password harus memiliki minimal 8 karakter.',
            'password.regex' => 'Password harus mengandung angka dan huruf kecil.',
        ]);


        $user->update([
            'password' => bcrypt($request->password)
        ]);

        $user->save();

        $user->revokePermissionTo('update-password');
        $user->givePermissionTo('done-password');

        return redirect()->route('dashboard');
    }

    
}
