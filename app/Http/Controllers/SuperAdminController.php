<?php

namespace App\Http\Controllers;

use App\Models\SuperAdmin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SuperAdmin $superAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuperAdmin $superAdmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuperAdmin $superAdmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuperAdmin $superAdmin)
    {
        //
    }


    // User Function

    public function manageStore(Request $request): RedirectResponse
    {
        $user = User::find($request->id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Data Berhasil Diubah');
    }

    public function manageUser()
    {
        $user = User::role(['user', 'admin', 'kppm'])->get();
        return view('superAdmin.manageUser.user', compact('user'));
    }

    public function manageUserDestroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }

    public function manageUserEdit($id)
    {
        $user = User::find($id);

        return view('superAdmin.manageUser.edit', compact('user'));
    }

    public function manageSekertaris()
    {
        $user = User::role('sekertaris')->get();
        return view('superAdmin.manageUser.sekertaris', compact('user'));
    }

    public function manageSekertarisDestroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }

    public function manageSekertarisEdit($id)
    {
        $user = User::find($id);

        return view('superAdmin.manageUser.edit', compact('user'));
    }

    public function sekertarisCreate()
    {
        return view('superAdmin.manageUser.sekertaris.create');
    }

    public function sekertarisStore(Request $request): redirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:user',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user->assignRole('sekertaris');

        return redirect()->route('superadmin.manage.sekertaris')->with([
            'success' => 'Data Berhasil Ditambahkan',
        ]);
    }


    public function manageReviewer()
    {
        $user = User::role('reviewer')->get();
        return view('superAdmin.manageUser.reviewer', compact('user'));
    }

    public function manageReviewerDestroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }

    public function manageReviewerEdit($id)
    {
        $user = User::find($id);

        return view('superAdmin.manageUser.edit', compact('user'));
    }

    public function reviewerCreate()
    {
        return view('superAdmin.manageUser.reviewer.create');
    }

    public function reviewerStore(Request $request): redirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:user',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user->assignRole('reviewer');

        return redirect()->route('superadmin.manage.reviewer')->with([
            'success' => 'Data Berhasil Ditambahkan',
        ]);
    }



    // Security Function
    public function manageRole()
    {

        return view('superAdmin.manageSecurity.role');
    }

    public function managePermission()
    {
        return view('superAdmin.manageSecurity.permission');
    }

    public function managePassword()
    {
        return view('superAdmin.manageSecurity.password');
    }

    public function changePassword()
    {
        return view('superAdmin.manageSecurity.changePassword');
    }

    public function manageProdi()
    {
        return view('superAdmin.manageSelect.prodi');
    }

    public function manageTypeAjuan()
    {
        return view('superAdmin.manageSelect.typeAjuan');
    }

    public function manageDocumentType()
    {
        return view('superAdmin.manageDokumen.typeDocument');
    }

    public function manageView()
    {
        return view('superAdmin.manageView.dashboard');
    }




}
