<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ListGroupsController;
use App\Http\Controllers\ListTaskController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotesController;
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
Route::get('/login', [AuthenticationController::class, 'index']);
Route::get('/register', [AuthenticationController::class, 'show_register']);

// Main Routes
Route::get('/assignment', [ListTaskController::class, 'index']);
Route::get('/notes', [NotesController::class, 'index']);
Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/study_groups', [ListGroupsController::class, 'index']);

// Profile Page
Route::get('/profile/edit', [ProfileController::class, 'show']);
Route::post('/profile/update', [ProfileController::class, 'update']);

// Student Routes -Detailed

// Teacher Routes - Detailed