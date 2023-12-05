<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ListGroupsController;
use App\Http\Controllers\ListTaskController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\TestingController;
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

Route::get('/testing', [TestingController::class, 'index']);

// Authentication Routes
Route::group(['middleware' => ['guest']], (function () {
    // Login
    Route::get('/login', [AuthenticationController::class, 'index'])->name('login');
    Route::post('/login', [AuthenticationController::class, 'authenticate']);

    // Register
    Route::get('/register', [AuthenticationController::class, 'show_register']);
    Route::post('/register', [AuthenticationController::class, 'register']);
}));

// Dashboard Routes
Route::group(['middleware' => ['auth']], (function () {
    // Profile Page
    Route::get('/profile', [ProfileController::class, 'index']);
    // Main Profile - Edit
    Route::get('/profile/edit', [ProfileController::class, 'edit']);
    Route::post('/profile/update', [ProfileController::class, 'update']);
    // Main Profile - Change Password
    Route::get('/profile/change-password', [ProfileController::class, 'password']);
    Route::put('/profile/update-password', [ProfileController::class, 'update_password']);

    // Note Page
    Route::get('/notes', [NotesController::class, 'index']);
    // Note Page - Create
    Route::get('/notes/prepare', [NotesController::class, 'prepare']);
    Route::post('/notes/create', [NotesController::class, 'create']);
    // Note Page - Detail
    Route::get('/notes/id/detail', [NotesController::class, 'edit']);
    Route::post('/notes/id/update', [NotesController::class, 'update']);
    Route::post('/notes/id/destroy', [NotesController::class, 'destroy']);
}));

// Student Routes ---------------------------------------------------------------------------
Route::group(['middleware' => ['auth']], (function () {
    // Assignment
    Route::get('/student/assignment', [ListTaskController::class, 'index_student']);
    Route::get('/student/assignment/id/detail', [ListTaskController::class, 'show_assignment_student']);
    Route::get('/student/assignment/id/prepare', [ListTaskController::class, 'prepare_assignment_student']);
    Route::post('/student/assignment/id/submit', [ListTaskController::class, 'submit_assignment_student']);

    // Study Groups
    Route::get('/student/study-groups', [ListGroupsController::class, 'index_student']);
    Route::post('/student/study-groups/{id}/left', [ListGroupsController::class, 'left_student_group']);
}));

// Teacher Routes ---------------------------------------------------------------------------
// Student Routes ---------------------------------------------------------------------------
Route::group(['middleware' => ['auth', 'auth.teacher']], (function () {
    // Assignment
    Route::get('/teacher/assignment', [ListTaskController::class, 'index_teacher']);
    Route::get('/teacher/assignment/prepare', [ListTaskController::class, 'prepare_assignment_teacher']);
    Route::post('/teacher/assignment/create', [ListTaskController::class, 'create_assignment_teacher']);
    Route::get('/teacher/assignment/id/detail', [ListTaskController::class, 'show_assignment_teacher']);
    Route::get('/teacher/assignment/id/status', [ListTaskController::class, 'status_assignment_teacher']);
    Route::get('/teacher/assignment/id/status/student', [ListTaskController::class, 'detail_status_assignment_teacher']);
    // Study Groups
    Route::get('/teacher/study-groups', [ListGroupsController::class, 'index_teacher']);
    Route::get('/teacher/study-groups/prepare', [ListGroupsController::class, 'prepare_study_groups_teacher']);
    Route::post('/teacher/study-groups/create', [ListGroupsController::class, 'create_study_groups_teacher']);
    Route::get('/teacher/study-groups/id/detail', [ListGroupsController::class, 'detail_study_groups_teacher']);
    Route::get('/teacher/study-groups/id/edit', [ListGroupsController::class, 'edit_study_groups_teacher']);
    Route::post('/teacher/study-groups/id/invite', [ListGroupsController::class, 'invite_study_groups_teacher']);
}));

// Resource
Route::resource('profile', ProfileController::class);
Route::resource('notes', NotesController::class);
Route::resource('list-assignment', ListTaskController::class);
Route::resource('list-group', ListGroupsController::class);
