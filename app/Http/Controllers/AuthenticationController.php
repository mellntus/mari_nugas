<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Utility\Utility;
use Illuminate\Http\RedirectResponse;
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

    public function authenticate(Request $request): RedirectResponse
    {

        // Get detail user
        $data = User::with('roles')->where('email', $request->inputEmail);

        // Check data exists or not
        if (!$data->exists()) {
            return back()->with(
                'loginError',
                'Email or password is wrong'
            );
        }

        // Get only one data
        $data = $data->first();

        // Validate password
        if ($data->password != $request->inputPassword) {
            return back()->with(
                'loginError',
                'Email or password is wrong'
            );
        }

        Auth::login($data);
        $request->session()->regenerate();

        return redirect()->route('profile.index');
    }

    public function register(Request $request)
    {
        // Check current login user
        if ($request->inputPassword != $request->inputConfirmPassword) {
            return back()->with('loginError', 'Password doesnt match');
        }

        $utility = new Utility();
        $tag = $utility->get_random_string();

        $is_exist = User::where('email', $request->inputEmail)->exists();
        if ($is_exist) {
            return back()->with('loginError', 'Email has been used');
        }

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

        return redirect('/login')->with('success', 'Account has been created!');
    }

    public function prepare_logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
