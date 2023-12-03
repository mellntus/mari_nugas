<?php

namespace App\Http\Controllers;

use App\Models\DetailTask;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Response;


class TestingController extends Controller
{
    public function index(): View
    {
        // Get all user]

        // User::with('roles')->where('uid', '3ce7cc43-24a9-4416-9411-f4a40849d90c')->get();
        $user = User::with('roles')->get();

        // ->find(intval($user->roles_id))
        return view('content.teacher.sample', [
            'list_user' => $user
        ]);
    }

    public function show_file($id)
    {
        $pdf = DetailTask::find($id);

        $response = Response::make($pdf->image, 200);
        $response->header('Content-Type', 'application/pdf');
        $response->header('Content-Disposition', 'inline; filename="' . $pdf->image . '"');

        return $response;
    }

    public function download($id)
    {
        $pdf = DetailTask::find($id);

        $response = Response::make($pdf->image, 200);
        $response->header('Content-Type', 'application/pdf');
        $response->header('Content-Disposition', 'attachment; filename="' . $pdf->image . '"');

        // How to call?
        // Blade
        // <a href={{ url("/show_file/".$blog->id) }}>View {{ $blog->image }}</a>
        // Routes
        // Route::get('/show_file/{id}', [BlogController::class, "show_file"]);

        return $response;
    }
}
