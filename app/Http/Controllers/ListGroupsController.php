<?php

namespace App\Http\Controllers;

use App\Models\ListGroups;
use App\Http\Requests\StoreListGroupsRequest;
use App\Http\Requests\UpdateListGroupsRequest;

class ListGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_student()
    {
        return view("content.student.study_group.study_groups");
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
    public function store(StoreListGroupsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ListGroups $listGroups)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ListGroups $listGroups)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateListGroupsRequest $request, ListGroups $listGroups)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ListGroups $listGroups)
    {
        //
    }
}
