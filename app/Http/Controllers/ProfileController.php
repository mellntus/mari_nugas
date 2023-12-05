<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Default view
    public function index()
    {
        // Get from current session
        $data = Auth::user();

        return view('content.' . $data->roles->name . '.profile.profile', [
            'data' => $data,
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

    public function edit(): View
    {
        // Get from current session
        $data = Auth::user();

        // Edit current user profile
        return view('content.' . $data->roles->name . '.profile.edit_profile', [
            'user' => $data
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        // Get from current session
        $data = Auth::user();

        // Get detail profile
        $id = $data->uid;
        $profile = User::where('uid', $id);

        // Make sure data is exists
        if ($profile->exists()) {
            $profile = $profile->first();
            $profile->update([
                'email' => $request->profile_email,
                'username' => $request->profile_username,
                'address' => $request->profile_address
            ]);
        }

        return redirect()->route('profile.index');
    }

    public function password()
    {
        // Get from current session
        $data = Auth::user();

        $roles = $data->roles->name;
        return view('content.' . $roles . '.profile.password_profile', [
            'user' => $data
        ]);
    }

    public function update_password(Request $request): RedirectResponse
    {
        // Get from current session
        $data = Auth::user();

        // Validate current password
        if ($request->profile_old_password != $request->profile_new_password) {
            return back()->withErrors("Can't use the same password");
        }

        // Validate new password
        if ($request->profile_new_password != $request->profile_confirm_password) {
            return back()->withErrors("Password doesn't match");
        }

        // Get detail profile
        $id = $data->uid;
        $profile = User::where('uid', $id);

        // Make sure data is exists
        if ($profile->exists()) {
            $profile = $profile->first();
            $profile->update([
                'password' => $request->profile_new_password
            ]);
        }

        return redirect()->route('profile.index');
    }
}
