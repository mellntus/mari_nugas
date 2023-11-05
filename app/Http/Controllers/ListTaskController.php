<?php

namespace App\Http\Controllers;

use App\Models\ListTask;
use App\Http\Requests\StoreListTaskRequest;
use App\Http\Requests\UpdateListTaskRequest;

class ListTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Validation for student and teacher

        // Default student assignment page as dashboard
        return view('content.student.assignment');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreListTaskRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ListTask $listTask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ListTask $listTask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateListTaskRequest $request, ListTask $listTask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ListTask $listTask)
    {
        //
    }
}
