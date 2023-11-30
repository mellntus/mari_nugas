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
        $is_fail = False;
        $data = User::with('roles')->where(['email' => $request->inputEmail])->first();
        if (
            $data == False || $data->email != $request->inputEmail
            || $data->password != $request->inputPassword
        ) {
            $is_fail = True;
        }

        // Check status validation
        if ($is_fail == True) {
            return redirect("/login")->with(
                'loginError',
                'Email or password is wrong'
            );
        }

        // Store data to session
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            $request->session()->put($data);
            return redirect()->intended('/' . $data->roles->name . '/assignment');
        };

        return redirect("/login")->with('Login details are not valid');
    }

    public function register(Request $request)
    {

        // Check current login user
        if ($request->inputPassword != $request->inputConfirmPassword) {
            return redirect("/register")->with('loginError', 'Password doesnt match');
        }

        $utility = new Utility();
        $tag = $utility->get_random_string();

        $is_exist = User::where('email', $request->inputEmail);
        if ($is_exist) {
            return redirect("/login")->with('loginError', 'Email has been used');
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

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
