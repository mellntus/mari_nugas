<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Utility\Utility;
use Illuminate\Http\Request;
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

            return redirect()->intended('/profile');
        }

        return back()->with('loginError', 'Login Failed');
    }

    public function register(Request $request)
    {
        // Validate user input
        // $this->validate($request, [
        //     'inputEmail' => 'required|email',
        //     'inputUsername' => 'required|without_spaces',
        //     'inputPassword' => 'required',
        //     'inputConfirmPassword' => $request->inputPassword == $request->inputConfirmPassword,
        //     'inputRoles' => 'required'
        // ]);

        $utility = new Utility();
        $tag = $utility->get_random_string();

        // Create user
        User::create([
            'uid' => $utility->get_uuid(),
            'roles_id' => $request->inputRoles,
            'username' => $request->inputUsername,
            'password' => $request->inputPassword,
            'email' => $request->inputEmail,
            'address' => '-',
            'tag' => $tag
        ]);

        return redirect('/login')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
