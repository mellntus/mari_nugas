<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    /**
     * Here is the controller for Login and Register
     */

    public function index()
    {
        return view('content.auth.login');
    }

    public function show_register()
    {
        return view('content.auth.register');
    }

    public function authenticate(Request $request)
    {
        $user = User::where([
            'email' => $request->email,
            'password' => $request->password
        ])->first();

        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();

            return redirect()->intended('/menu');
        }

        return back()->with('loginError', 'Login Failed');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
