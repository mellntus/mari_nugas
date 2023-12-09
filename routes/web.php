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

// Index
Route::get('/', [IndexController::class, 'index']);
Route::get('/testing', [TestingController::class, 'index']);

// Authentication Routes
Route::group(['middleware' => ['guest']], (function () { #

    // Login
    Route::get('/login', [AuthenticationController::class, 'index'])->name('login');
    Route::post('/login', [AuthenticationController::class, 'authenticate']);

    // Register
    Route::get('/register', [AuthenticationController::class, 'show_register']);
    Route::post('/register', [AuthenticationController::class, 'register']);
}));

// Dashboard Routes
Route::group(['middleware' => ['auth']], (function () { #

    // Logout
    Route::get('/logout', [AuthenticationController::class, 'prepare_logout']);
    Route::post('/logout', [AuthenticationController::class, 'logout']);

    // Profile Page
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    // Main Profile - Edit
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    // Main Profile - Change Password
    Route::get('/profile/change-password', [ProfileController::class, 'password'])->name('profile.password');
    Route::put('/profile/update-password', [ProfileController::class, 'update_password'])->name('profile.update_password');

    // Note Page
    Route::get('/notes', [NotesController::class, 'index'])->name('notes.index');
    // Note Page - Create
    Route::get('/notes/prepare', [NotesController::class, 'prepare'])->name('notes.prepare');
    Route::post('/notes/create', [NotesController::class, 'create'])->name('notes.create');
    // Note Page - Detail
    Route::get('/notes/{id}/detail', [NotesController::class, 'edit'])->name('notes.edit');
    Route::put('/notes/{id}/update', [NotesController::class, 'update'])->name('notes.update');
    Route::delete('/notes/{id}/destroy', [NotesController::class, 'destroy'])->name('notes.destroy');
}));

// Student Routes ---------------------------------------------------------------------------
Route::group(['middleware' => ['auth']], (function () {
    // Assignment
    Route::get('/student/assignment', [ListTaskController::class, 'index_student'])->name('list_assignment.index_student'); ##
    Route::get('/student/assignment/{id}/detail', [ListTaskController::class, 'show_assignment_student'])->name('list_assignment.show_assignment_student'); ##
    Route::get('/student/assignment/{id}/prepare', [ListTaskController::class, 'prepare_assignment_student'])->name('list_assignment.prepare_assignment_student'); ##
    Route::put('/student/assignment/{id}/submit', [ListTaskController::class, 'submit_assignment_student'])->name('list_assignment.submit_assignment_student'); ##

    // Study Groups
    Route::get('/student/study_groups', [ListGroupsController::class, 'index_student'])->name('list_group.index_student'); ##
    Route::delete('/student/study_groups/{id}/left', [ListGroupsController::class, 'left_group_student'])->name('list_group.left_group_student'); ##

    // Download File
    Route::get('/student/assignment/sample/{id}/download', [ListTaskController::class, 'download_sample'])->name('list_assignment.download_sample'); ##
    Route::get('/student/assignment/{task_id}/submitted/{participant_id}/download', [ListTaskController::class, 'download_submitted'])->name('list_assignment.download_submitted'); ##

    // Show File
    Route::get('/student/assignment/sample/{id}/show', [ListTaskController::class, 'show_file_sample'])->name('list_assignment.show_file_sample'); ##
    Route::get('/student/assignment/{task_id}/submitted/{participant_id}/show', [ListTaskController::class, 'show_file_submitted'])->name('list_assignment.show_file_submitted'); ##
}));

// Teacher Routes ---------------------------------------------------------------------------
Route::group(['middleware' => ['auth']], (function () {
    // Assignment
    Route::get('/teacher/assignment', [ListTaskController::class, 'index_teacher'])->name('list_assignment.index_teacher'); #
    Route::get('/teacher/assignment/prepare', [ListTaskController::class, 'prepare_assignment_teacher'])->name('list_assignment.prepare_assignment_teacher'); #
    Route::post('/teacher/assignment/create', [ListTaskController::class, 'create_assignment_teacher'])->name('list_assignment.create_assignment_teacher'); #
    Route::get('/teacher/assignment/{id}/detail', [ListTaskController::class, 'show_assignment_teacher'])->name('list_assignment.show_assignment_teacher'); #
    Route::put('/teacher/assignment/{id}/update', [ListTaskController::class, 'update_assignment_teacher'])->name('list_assignment.update_assignment_teacher'); #
    Route::get('/teacher/assignment/{id}/status', [ListTaskController::class, 'status_assignment_teacher'])->name('list_assignment.status_assignment_teacher'); ##
    Route::get('/teacher/assignment/{id}/delete', [ListTaskController::class, 'delete_assignment_teacher'])->name('list_assignment.delete_assignment_teacher'); #

    // Study Groups
    Route::get('/teacher/study_groups', [ListGroupsController::class, 'index_teacher'])->name('list_group.index_teacher'); #
    Route::get('/teacher/study_groups/prepare', [ListGroupsController::class, 'prepare_study_groups_teacher'])->name('list_group.prepare_study_groups_teacher'); #
    Route::post('/teacher/study_groups/create', [ListGroupsController::class, 'create_study_groups_teacher'])->name('list_group.create_study_groups_teacher'); #
    Route::get('/teacher/study_groups/{id}/detail', [ListGroupsController::class, 'detail_study_groups_teacher'])->name('list_group.detail_study_groups_teacher'); #
    Route::get('/teacher/study_groups/{id}/edit', [ListGroupsController::class, 'edit_study_groups_teacher'])->name('list_group.edit_study_groups_teacher'); #
    Route::put('/teacher/study_groups/{id}/update', [ListGroupsController::class, 'update_study_groups_teacher'])->name('list_group.update_study_groups_teacher'); #
    Route::post('/teacher/study_groups/{id}/invite', [ListGroupsController::class, 'invite_study_groups_teacher'])->name('list_group.invite_study_groups_teacher'); #
    Route::delete('/teacher/kick/{data}', [ListGroupsController::class, 'teacher_kick_student'])->name('list_group.teacher_kick_student'); #


    // Download File
    Route::get('/teacher/assignment/sample/{id}/download', [ListTaskController::class, 'download_sample'])->name('list_assignment.download_sample'); #
    Route::get('/teacher/assignment/{task_id}/submitted/{participant_id}/download', [ListTaskController::class, 'download_submitted'])->name('list_assignment.download_submitted'); #

    // Show File
    Route::get('/teacher/assignment/sample/{id}/show', [ListTaskController::class, 'show_file_sample'])->name('list_assignment.show_file_sample'); #
    Route::get('/teacher/assignment/{task_id}/submitted/{participant_id}/show', [ListTaskController::class, 'show_file_submitted'])->name('list_assignment.show_file_submitted'); #
}));
