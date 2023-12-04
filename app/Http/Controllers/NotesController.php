<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use App\Utility\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get from current session
        $data = Auth::user();

        // Get all notes data
        $notes = Notes::where('uid', $data->uid);

        return view('content.' . $data->roles->name . '.notes.notes', [
            'notes' => $notes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Get from current session
        $data = Auth::user();

        // Validate current input data
        // $this->validate($request, [
        //     'image'     => 'required|mimes:pdf|max:10000',
        //     'title'     => 'required',
        //     'content'   => 'required'
        // ]);

        $utility = new Utility();
        $response = Notes::create([
            'uid' => $utility->get_uuid(),
            'user_id' => $data->uid,
            'title' => $request->create_notes_title,
            'description' => $request->create_notes_content
        ]);

        // Send response

        return redirect("content." . $data->roles->name . ".notes.notes");
    }

    public function prepare()
    {
        // Get from current session
        $data = Auth::user();

        return view("content." . $data->roles->name . ".notes.create_notes");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Get from current session
        $data = Auth::user();
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // Get from current session
        $data = Auth::user();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Get from current session
        $data = Auth::user();

        return view("content." . $data->roles->name . ".notes.detail_notes");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Get from current session
        $data = Auth::user();

        return view("content." . $data->roles->name . ".notes.notes");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Get from current session
        $data = Auth::user();

        return view("content." . $data->roles->name . ".notes.notes");
    }
}
