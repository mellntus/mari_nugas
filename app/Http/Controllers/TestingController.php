<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TestingController extends Controller
{
    public function index(): View
    {
        // Get all user]

        $user = User::with('roles')->get();

        // ->find(intval($user->roles_id))
        return view('content.teacher.sample', [
            'list_user' => $user
        ]);
    }
}
