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
        $notes = Notes::where('user_id', $data->uid)->get();

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

        $utility = new Utility();

        // Create notes
        Notes::create([
            'uid' => $utility->get_uuid(),
            'user_id' => $data->uid,
            'title' => $request->create_notes_title,
            'description' => $request->create_notes_content
        ]);

        // Send response
        return redirect()->route('notes.index')->with(['success' => 'Berhasil menambahkan data']);
    }

    public function prepare()
    {
        // Get from current session
        $data = Auth::user();

        return view("content." . $data->roles->name . ".notes.create_notes");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Get from current session
        $data = Auth::user();

        // Get detail notes
        $notes = Notes::where('uid', $id);

        // Check if data exists for current user
        if (!$notes->exists()) {
            return redirect()->route('notes.index')->with(['error' => 'Data tidak ditemukan']);
        }

        $notes->first();

        return view("content." . $data->roles->name . ".notes.detail_notes", [
            'note' => $notes
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        // Get detail notes
        $notes = Notes::where('uid', $id);

        // Make sure data is exists
        if ($notes->exists()) {
            $notes = $notes->first();
            $notes->update([
                'title' => $request->edit_notes_title,
                'description' => $request->edit_notes_content
            ]);

            return redirect()->route('notes.index')->with(['success' => 'Update data berhasil']);
        }

        return redirect()->route('notes.index')->with(['error' => 'Terjadi kesalahan ketika update data']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Get detail
        $notes = Notes::where('uid', $id);

        if (!$notes->exists()) {
            return redirect()->route('notes.index')->with(['error' => 'Terjadi kesalahan ketika hapus data']);
        }

        //delete post
        $notes->delete();

        //redirect to index
        return redirect()->route('notes.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
