<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Default view
    public function index()
    {
        return view('content.profile.profile');
    }

    public function show()
    {
        return view('content.profile.edit_profile');
    }

    public function edit()
    {
        //
    }

    public function update()
    {
        return redirect()->intended('/profile');
    }

    public function password()
    {
        return view('content.profile.password_profile');
    }

    public function update_password()
    {
        return redirect()->intended('/profile');
    }
}
