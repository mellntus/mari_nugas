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
Route::get('/study_groups', [ListGroupsController::class, 'index']);

// Profile Page
Route::get('/profile', [ProfileController::class, 'index']);
// Main Profile - Edit
Route::get('/profile/edit', [ProfileController::class, 'show']);
Route::post('/profile/update', [ProfileController::class, 'update']);
// Main Profile - Change Password
Route::get('/profile/change-password', [ProfileController::class, 'password']);
Route::post('/profile/update-password', [ProfileController::class, 'update_password']);

// Note Page
Route::get('/notes', [NotesController::class, 'index']);
// Note Page - Create
Route::get('/notes/prepare', [NotesController::class, 'prepare']);
Route::post('/notes/create', [NotesController::class, 'create']);
// Note Page - Detail
Route::get('/notes/id/detail', [NotesController::class, 'edit']);
Route::post('/notes/id/update', [NotesController::class, 'update']);
Route::post('/notes/id/destroy', [NotesController::class, 'destroy']);

// Student Routes -Detailed
// Assignment
Route::get('/student-assignment', [ListTaskController::class, 'index_student']);
Route::get('/student-assignment/id/detail', [ListTaskController::class, 'show_assignment_student']);
Route::get('/student-assignment/id/submit', [ListTaskController::class, 'edit_assignment_student']);
Route::post('/student-assignment/id/create', [ListTaskController::class, 'submit_assignment_student']);

// Teacher Routes - Detailed
Route::get('/assignment', [ListTaskController::class, 'index_student']);
