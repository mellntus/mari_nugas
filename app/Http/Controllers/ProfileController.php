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
}
