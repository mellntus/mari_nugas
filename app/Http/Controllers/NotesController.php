<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use App\Http\Requests\StoreNotesRequest;
use App\Http\Requests\UpdateNotesRequest;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.notes.notes');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("content.notes.notes");
    }

    public function prepare()
    {
        return view("content.notes.create_notes");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNotesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Notes $notes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notes $notes)
    {
        return view("content.notes.detail_notes");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNotesRequest $request, Notes $notes)
    {
        return redirect("/notes");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notes $notes)
    {
        return redirect("/notes");
    }
}
