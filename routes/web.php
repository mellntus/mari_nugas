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

// Student Routes -Detailed
// Profile Page
Route::get('/student/profile', [ProfileController::class, 'index']);
// Main Profile - Edit
Route::get('/student/profile/edit', [ProfileController::class, 'show']);
Route::post('/student/profile/update', [ProfileController::class, 'update']);
// Main Profile - Change Password
Route::get('/student/profile/change-password', [ProfileController::class, 'password']);
Route::post('/student/profile/update-password', [ProfileController::class, 'update_password']);

// Note Page
Route::get('/student/notes', [NotesController::class, 'index']);
// Note Page - Create
Route::get('/student/notes/prepare', [NotesController::class, 'prepare']);
Route::post('/student/notes/create', [NotesController::class, 'create']);
// Note Page - Detail
Route::get('/student/notes/id/detail', [NotesController::class, 'edit']);
Route::post('/student/notes/id/update', [NotesController::class, 'update']);
Route::post('/student/notes/id/destroy', [NotesController::class, 'destroy']);

// Assignment
Route::get('/student/assignment', [ListTaskController::class, 'index_student']);
Route::get('/student/assignment/id/detail', [ListTaskController::class, 'show_assignment_student']);
Route::get('/student/assignment/id/submit', [ListTaskController::class, 'edit_assignment_student']);
Route::post('/student/assignment/id/create', [ListTaskController::class, 'submit_assignment_student']);
// Study Groups
Route::get('/student/study-groups', [ListGroupsController::class, 'index_student']);


// Teacher Routes - Detailed
Route::get('/assignment', [ListTaskController::class, 'index_student']);
