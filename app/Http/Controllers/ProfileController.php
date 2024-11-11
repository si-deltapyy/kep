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
            return view('user.profile.index', compact('data', 'user'));
        }
    }

    public function edit($profil)
    {
        $data = ProfileUser::where('user_id', $profil)->first();
        if($data->updated_at === null){

            $prodi = Prodi::all();
            return view('user.profile.edit', compact('data', 'prodi'));

        }else{

            return view('user.profile.index', compact('data'));
        }
    }

    /**
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectRespons
     */
    public function update(Request $request, $profil): RedirectResponse
    {
        $this->validate($request, [
            'name'     => 'required',
            'nik'     => 'required',
            'no'   => 'required'
        ]);

        //get post by ID
        $data = ProfileUser::where('user_id', $profil);
        $user = User::find($profil);


        //check if image is uploaded
        if ($data) {

            //update post with new image
            $data->update([
                'name'         => $request->name,
                'nik'          => $request->nik,
                'phone_number' => $request->no,
                'prodi_id'     => $request->prodi,
                'gender'       => $request->jl,
                'status'       => $request->sts,
                'address'      => $request->addr,
                'updated_at'   => now()
            ]);

            $user->update([
                'name' => $request->name
            ]);

            $user->revokePermissionTo('update-profile');
            $user->givePermissionTo('done-profile');

        } else {

            return redirect()->route('user.profile.edit')->with(['Error' => 'Data Salah']);
            return redirect()->route('user.profile.edit')->with(['Error' => 'Data Salah']);
        }

        //redirect to index
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
