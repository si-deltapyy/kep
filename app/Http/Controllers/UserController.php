<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    public function index(){
        $user = User::role('user')
        ->whereHas('permissions', function ($query) {
            $query->where('name', 'waiting-acception');
        })
        ->get();


        return view('pages.request.index', compact('user'));
    }

    public function rev(){
        $user = User::role('reviewer')->get();


        return view('pages.user.index', compact('user'));
    }

    public function Sekertaris(){
        $user = User::role('sekertaris')->get();

        return view('pages.user.admin.sekretaris.index', compact('user'));
    }

    public function editSekertaris($id){
        $user = User::find($id);

        return view('pages.user.admin.sekretaris.edit', compact('user'));
    }

    public function updateSekertaris(Request $request, $id): RedirectResponse{

        $user = User::find($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect()->route('admin.sekertarisList')->with(['success' => 'Data Berhasil Di update']);
    }

    public function makeUser($userId)
    {
        $user = User::findOrFail($userId);

        // Pastikan hanya pengguna yang ada di database
        $user->revokePermissionTo('waiting-acception');
        $user->givePermissionTo('update-profile');

        $mailData = [
            'title' => 'Akun anda telah diaktifasi',
            'body' => 'Silahkan login untuk melengkapi data diri anda. Nikmati layanan kami untuk mengajukan proposal penelitian.',
            'subject' => 'Activaiton Account Success ✅',
            'view' => 'pages.email.sendUser',
            'link' => 'login',
        ];

        Mail::to($user->email)->send(new SendMail($mailData));



        return redirect()->back()->with('success', 'User role has been updated to User.');
    }

    public function makeReviewer($userId)
    {
        $user = User::findOrFail($userId);

        // Menyinkronkan role 'reviewer'
        $user->syncRoles('reviewer');

        return redirect()->back()->with('success', 'User role has been updated to Reviewer.');
    }

    public function show($id){

    }

    public function create(){

    }

    public function store(Request $request){

    }

    public function edit($id){
        $user = User::find($id);

        return view('pages.user.edit', compact('user'));
    }

    public function update(Request $request, $id): RedirectResponse{

        $user = User::find($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect()->route('sekretariat.review.index')->with(['success' => 'Data Berhasil Di update']);
    }

    public function destroy($id): RedirectResponse{

        $user = User::find($id);
        $user->delete();

        return redirect()->route('sekretariat.review.index')->with(['success'=> 'Data Berhasil Dihapus']);
    }
}
