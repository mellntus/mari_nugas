<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }

    public function check_student_roles(Request $request)
    {
        // Get current session
        if ($request->session()->roles->name != 'student') {
            return redirect("")->intended("/teacher/assignment")->withErrors('User not a teacher!');
        }
    }

    public function check_teacher_roles(Request $request)
    {
        // Get current session
        if ($request->session()->roles->name != 'teacher') {
            return redirect("")->intended("/student/assignment")->withErrors('User not a teacher!');
        }
    }
}
