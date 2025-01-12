<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Prodi;
use App\Models\ProfileUser;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(){
        $data = ProfileUser::where('user_id', Auth::user()->id)->first();
        $user = User::all();

        if($data->updated_at === null){
            return redirect()->route('user.profile.edit', Auth::user()->id)->with(['Error' => 'Lengkapi Datamu']);
        }else{
            return view('pages.profile.index', compact('data', 'user'));
        }
    }

    public function edit($profil)
    {
        $data = ProfileUser::where('user_id', $profil)->first();
        $user = User::find($profil);
        if($data->updated_at === null){

            $prodi = Prodi::all();
            if ($user->hasPermissionTo('sso')){
                return view('pages.profile.edit.sso', compact('data', 'prodi'));
            }else{
                return view('pages.profile.edit', compact('data', 'prodi'));
            }


        }else{

            return view('pages.profile.index', compact('data'));
        }
    }

    /**
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectRespons
     */



    public function update(Request $request, $profil): RedirectResponse
    {
        // Ambil data profile dan user
        $data = ProfileUser::where('user_id', $profil)->first();
        $user = User::find($profil);


        //check if image is uploaded
        if ($data) {

            if ($user->hasPermissionTo('sso')){

            //update post with new image
        if (!$data || !$user) {
            return redirect()->route('pages.profile.edit')->with(['Error' => 'Data Salah']);
        }

        // Periksa permission
        if ($user->hasPermissionTo('done-profile')) {
            // Validasi untuk user dengan 'done-profile' permission
            $this->validate($request, [
                'name'         => 'required',
                'nik'          => 'required',
                'phone_number' => 'required',
                'gender'       => 'required',
                'status'       => 'required',
                'address'      => 'required',
                'prodi_id'     => 'required',
            ]);

            // Update data profile
            $data->update([
                'name'         => $request->input('name'),
                'nik'          => $request->input('nik'),
                'phone_number' => $request->input('phone_number'),
                'gender'       => $request->input('gender'),
                'status'       => $request->input('status'),
                'address'      => $request->input('address'),
                'prodi_id'     => $request->input('prodi_id'),
                'updated_at'   => now(),
            ]);

            // Update data user
            $user->update([
                'name' => $request->input('name'),
            ]);
        } else {
            // Validasi untuk user tanpa 'done-profile' permission
            $this->validate($request, [
                'name' => 'required',
                'nik'  => 'required',
                'no'   => 'required',
            ]);

            // Update dengan logika izin
            $data->update([
                'name'         => $request->name,
                'nik'          => $request->nik,
                'phone_number' => $request->no,
                'prodi_id'     => $request->prodi,
                'gender'       => $request->jl,
                'status'       => $request->sts,
                'address'      => $request->addr,
                'updated_at'   => now(),
            ]);

            $user->update([
                'name' => $request->name,
            ]);

            // Ubah izin
            $user->revokePermissionTo('update-profile');
            $user->revokePermissionTo('sso');
            $user->givePermissionTo('done-profile');
            } elseif ($user->hasPermissionTo('user')){
                $data->update([
                    'name'         => $request->name,
                    'nik'          => $request->nik,
                    'phone_number' => $request->no,
                    'univ'         => $request->univ,
                    'prodi_luar'   => $request->prodi,
                    'gender'       => $request->jl,
                    'status'       => $request->sts,
                    'address'      => $request->addr,
                    'updated_at'   => now()
                ]);

                $user->update([
                    'name' => $request->name
                ]);

                $user->revokePermissionTo('update-profile');
                $user->revokePermissionTo('user');
                $user->givePermissionTo('done-profile');
            }

        } else {

            return redirect()->route('pages.profile.edit')->with(['Error' => 'Data Salah']);
        }

        // Redirect dengan pesan sukses
        return redirect()->route('dashboard')->with(['success' => 'Data Berhasil Diubah!']);
    }



    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
