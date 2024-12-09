<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $user = User::role('user')
        ->whereHas('permissions', function ($query) {
            $query->where('name', 'approved');
        })
        ->get();


        return view('pages.request.index', compact('user'));
    }

    public function rev(){
        $user = User::role('reviewer')->get();


        return view('pages.user.index', compact('user'));
    }

    public function makeUser($userId)
    {
        $user = User::findOrFail($userId);

        // Pastikan hanya pengguna yang ada di database
        $user->revokePermissionTo('approved');
        $user->givePermissionTo('update-profile');

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
