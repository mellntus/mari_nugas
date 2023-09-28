<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Default Routes
Route::get('/', [IndexController::class, 'index']);

// Login Routes
Route::get('/login', [AuthenticationController::class, 'show_login']);
Route::get('/register', [AuthenticationController::class, 'show_register']);
Route::get('/dashboard', [AuthenticationController::class, 'show_dashboard']);

// Student Routes

// Teacher Routes