<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\User;

class ProfileController extends Controller
{
    // Default view
    public function index()
    {
        $session = "";
        $data = User::with('roles')->where('uid', $session->uid)->first();

        return view('content.' . $data->roles->name . '.profile.profile', [
            'email' => $data->email,
            'uid' => $data->uid,
            'username' => $data->username,
            'address' => $data->address,
            'roles' => $data->roles->name,
            'tag' => $data->tag
        ]);
    }

    public function show()
    {

        return view('content.profile.edit_profile');
    }

    public function edit($data): View
    {
        //get post by ID
        $roles = $data->roles->name;

        //render view with post
        return view('content.profile.' . $roles . 'profile.edit_profile', [
            'user' => $data
        ]);
    }

    public function update(Request $request, $data): RedirectResponse
    {
        // Get detail profile
        $id = $data->uid;
        $profile = User::findOrFail($id);

        $profile->update([
            'email' => $request->profile_email,
            'username' => $request->profile_name,
            'address' => $request->profile_address
        ]);

        return redirect()->route('content.' . $data . '.profile.profile');
    }

    public function password($data)
    {
        $roles = $data->post->name;
        return view('content.' . $roles . 'profile.password_profile', [
            'user' => $data
        ]);
    }

    public function update_password(Request $request, $data): RedirectResponse
    {
        // Validate current password

        // Validate new password

        // Get detail password
        $id = $data->uid;
        $profile = User::findOrFail($id);

        // Update new password
        $profile->update([
            'password' => $request->profile_new_password
        ]);

        return redirect()->route('profile.index');
    }
}
