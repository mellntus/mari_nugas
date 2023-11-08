<?php

namespace App\Http\Controllers;

use App\Models\ListTask;
use App\Http\Requests\StoreListTaskRequest;
use App\Http\Requests\UpdateListTaskRequest;

class ListTaskController extends Controller
{
    // ----------------------------------------
    // Student Section
    /**
     * Display a listing of the resource.
     */
    public function index_student()
    {
        // Validation for student and teacher

        // Default student assignment page as dashboard
        return view('content.student.assignment.assignment');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function submit_assignment_student()
    {
        return view("content.student.assignment.submit_assignment");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_assignment_student(StoreListTaskRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show_assignment_student(ListTask $listTask)
    {
        return view("content.student.assignment.detail_assignment");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_assignment_student(ListTask $listTask)
    {
        return view("content.student.assignment.submit_assignment");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_assignment_student(UpdateListTaskRequest $request, ListTask $listTask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_assignment_student(ListTask $listTask)
    {
        //
    }


    // ----------------------------------------
    // Teacher Section
}
