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
    Route::get('/student/assignment/{task_id}/sample/{participant_id}/download', [ListTaskController::class, 'download_sample'])->name('list_assignment.download_sample'); ##
    Route::get('/student/assignment/{task_id}/submitted/{participant_id}/download', [ListTaskController::class, 'download_submitted'])->name('list_assignment.download_submitted'); ##

    // Show File
    Route::get('/student/assignment/{task_id}/sample/{participant_id}/show', [ListTaskController::class, 'show_file_sample'])->name('list_assignment.show_file_sample'); ##
    Route::get('/student/assignment/{task_id}/submitted/{participant_id}/show', [ListTaskController::class, 'show_file_submitted'])->name('list_assignment.show_file_submitted'); ##
}));

// Teacher Routes ---------------------------------------------------------------------------
Route::group(['middleware' => ['auth']], (function () {
    // Assignment
    Route::get('/teacher/assignment', [ListTaskController::class, 'index_teacher'])->name('list_assignment.index_teacher'); ##
    Route::get('/teacher/assignment/prepare', [ListTaskController::class, 'prepare_assignment_teacher'])->name('list_assignment.prepare_assignment_teacher'); ##
    Route::post('/teacher/assignment/create', [ListTaskController::class, 'create_assignment_teacher'])->name('list_assignment.create_assignment_teacher'); ##
    Route::get('/teacher/assignment/{id}/detail', [ListTaskController::class, 'show_assignment_teacher'])->name('list_assignment.show_assignment_teacher'); ##
    Route::put('/teacher/assignment/{id}/update', [ListTaskController::class, 'update_assignment_teacher'])->name('list_assignment.update_assignment_teacher'); ##
    Route::get('/teacher/assignment/{id}/status', [ListTaskController::class, 'status_assignment_teacher'])->name('list_assignment.status_assignment_teacher'); ##

    // Study Groups
    Route::get('/teacher/study_groups', [ListGroupsController::class, 'index_teacher'])->name('list_group.index_teacher'); #
    Route::get('/teacher/study_groups/prepare', [ListGroupsController::class, 'prepare_study_groups_teacher'])->name('list_group.prepare_study_groups_teacher'); #
    Route::post('/teacher/study_groups/create', [ListGroupsController::class, 'create_study_groups_teacher'])->name('list_group.create_study_groups_teacher'); #
    Route::get('/teacher/study_groups/{id}/detail', [ListGroupsController::class, 'detail_study_groups_teacher'])->name('list_group.detail_study_groups_teacher'); #
    Route::get('/teacher/study_groups/{id}/edit', [ListGroupsController::class, 'edit_study_groups_teacher'])->name('list_group.edit_study_groups_teacher'); #
    Route::put('/teacher/study_groups/{id}/update', [ListGroupsController::class, 'update_study_groups_teacher'])->name('list_group.update_study_groups_teacher'); #
    Route::post('/teacher/study_groups/{id}/invite', [ListGroupsController::class, 'invite_study_groups_teacher'])->name('list_group.invite_study_groups_teacher'); ##
    Route::delete('/teacher/study_groups/{id}/kick', [ListGroupsController::class, 'teacher_kick_student'])->name('list_group.teacher_kick_student'); ##


    // Download File
    Route::get('/teacher/assignment/{task_id}/sample/{participant_id}/download', [ListTaskController::class, 'download_sample'])->name('list_assignment.download_sample'); ##

    // Show File
    Route::get('/teacher/assignment/{task_id}/sample/{participant_id}/show', [ListTaskController::class, 'show_file_sample'])->name('list_assignment.show_file_sample'); ##
}));

// // Resource
// Route::resource('profile', ProfileController::class, [
//     'names' => [
//         'index' => 'profile.index',
//         'edit' => 'generated::PssNejvENd2NFgva',
//         'update' => 'generated::O5xITVJBl7zXwraG',
//         'password' => 'generated::Z28n51uPEZuLsft8',
//         'update_password' => 'generated::0mBuqMshBxbHcEsB'
//     ]
// ]);
// Route::resource('notes', NotesController::class, [
//     'names' => [
//         'index' => 'notes.index',
//         'create' => 'generated::nqFSk37JeDabLxPq',
//         'prepare' => 'generated::6VLuiRJ7z4cu7pXD',
//         'edit' => 'generated::TtDvFRffd49841or',
//         'update' => 'generated::FkgYqAqWVJ9yr0dT',
//         'destroy' => 'generated::kKhvzrEBYaKtVVu0'
//     ]
// ]);
// Route::resource('list_assignment', ListTaskController::class, [
//     'names' => [
//         'index_student' => 'generated::L6LmSDzeX8GRtecs',
//         'show_assignment_student' => 'generated::xlCpNu5dxZRmnSne',
//         'prepare_assignment_student' => 'generated::HzJgAil3ZpJ6eNX3',
//         'update_assignment_student' => 'generated::33PRJIuilMzWAQQb',
//         'index_teacher' => 'generated::17JPqnUZDqgxbwv7',
//         'prepare_assignment_teacher' => 'generated::8dmzUt5d9BJeV7Aq',
//         'create_assignment_teacher' => 'generated::13Sfe7OYYTgrz3yI',
//         'show_assignment_teacher' => 'generated::HZMj9hBhjZVlZ6bd',
//         'update_assignment_teacher' => 'generated::4lBqeS4PM1KQsJYC',
//         'status_assignment_teacher' => 'generated::IIn0bTt5JzVfgE2E'
//     ]
// ]);
// Route::resource('list_group', ListGroupsController::class, [
//     'names' => [
//         'index_student' => 'generated::p4auE8TV26j06qri',
//         'left_group_student' => 'generated::pi0FmKXxmYaBTsBP',
//         'index_teacher' => 'generated::Vr3895JO5Nb2Jr3l',
//         'prepare_study_groups_teacher' => 'generated::rDjaoQ6LBFc1e0E0',
//         'create_study_groups_teacher' => 'generated::FG1RUZ0X0R4Oiq74',
//         'invite_study_groups_teacher' => 'notes.index',
//         'detail_study_groups_teacher' => 'notes.index',
//         'edit_study_groups_teacher' => 'notes.index',
//         'update_study_groups_teacher' => 'notes.index',
//         'teacher_kick_student' => 'notes.index',

//     ]
// ]);
