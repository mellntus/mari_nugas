<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    //
    public function index()
    {
        if (Auth::user()) {
            return redirect()->route('profile.index');
        }
        return view('index');
    }
}
