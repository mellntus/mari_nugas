<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AuthenticationController;

class ProfileController extends Controller
{
    //
    public function index()
    {
        $data = new AuthenticationController();
        echo $data->show_login();
    }
}
