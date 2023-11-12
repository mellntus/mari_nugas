<?php

namespace App\Http\Controllers;

use App\Models\ListGroups;
use App\Http\Requests\StoreListGroupsRequest;
use App\Http\Requests\UpdateListGroupsRequest;

class ListGroupsController extends Controller
{
    // Student Section -----------------------------------------------
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

    // Teacher Section -----------------------------------------------
    /**
     * Display a listing of the resource.
     */
    public function index_teacher()
    {
        return view("content.teacher.study_group.study_groups");
    }

    public function prepare_study_groups_teacher()
    {
        return view("content.teacher.study_group.create_study_groups");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_study_groups_teacher()
    {
        //
    }

    public function invite_study_groups_teacher()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_teacher(StoreListGroupsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function detail_study_groups_teacher(ListGroups $listGroups)
    {
        return view("content.teacher.study_group.detail_study_groups");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_study_groups_teacher(ListGroups $listGroups)
    {
        return view("content.teacher.study_group.edit_study_groups");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_teacher(UpdateListGroupsRequest $request, ListGroups $listGroups)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_teacher(ListGroups $listGroups)
    {
        //
    }
}
