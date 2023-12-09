<?php

namespace App\Http\Controllers;

use App\Models\ListGroups;
use App\Models\DetailGroups;
use App\Models\User;
use App\Utility\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListGroupsController extends Controller
{
    // Student Section -----------------------------------------------
    /**
     * Display a listing of the resource.
     */
    public function index_student()
    {
        // Get from current session
        $data = Auth::user();

        // Check roles
        if ($data->roles->name != "student") {
            return redirect()->route('list_group.index_teacher');
        }

        // Get current user joined groups
        $groups = ListGroups::where('participant_id', $data->uid);

        // Check current data
        if ($groups->exists()) {
            $groups = $groups->get();
            // Get all detail participants
            for ($count = 1; $count <= count($groups); $count++) {
                $index = $count - 1;
                $current_groups_participant = ListGroups::where('group_id', $groups[$index]->group_id);
                $groups[$index]['total_participant'] = count($current_groups_participant->get());
            }
        };

        return view("content." . $data->roles->name . ".study_group.study_groups", [
            'groups' => $groups
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function left_group_student($id)
    {
        // Get from current session
        $data = Auth::user();

        // Check roles
        if ($data->roles->name != "student") {
            return redirect()->route('list_group.index_teacher');
        }

        // Get detail list groups
        $current_groups = ListGroups::where("participant_id", $data->uid)
            ->where("group_id", $id);

        if (!$current_groups->exists()) {
            return back()->with(['error' => 'Terjadi kesalahan ketika hapus data']);
        }

        // Delete from joined groups
        $current_groups->delete();

        return redirect()->route('list_group.index_student')->with(['success' => 'Sukses keluar dari group']);
    }

    // Teacher Section -----------------------------------------------
    /**
     * Display a listing of the resource.
     */
    public function index_teacher()
    {
        // Get from current session
        $data = Auth::user();

        // Check roles
        if ($data->roles->name != "teacher") {
            return redirect()->route('list_group.index_student');
        }

        // Get list of created groups
        $list_groups = DetailGroups::where('owner_id', $data->uid);

        // Check if the data exist or not
        if ($list_groups->exists()) {
            $list_groups = $list_groups->get();
            // Get all detail participants
            for ($count = 1; $count <= count($list_groups); $count++) {
                $index = $count - 1;
                $current_groups_participant = ListGroups::where('group_id', $list_groups[$index]->uid);
                $list_groups[$index]['total_participant'] = count($current_groups_participant->get());
            }
        }

        return view("content.teacher.study_group.study_groups", [
            'list_groups' => $list_groups
        ]);
    }

    public function prepare_study_groups_teacher()
    {
        // Get from current session
        $data = Auth::user();

        // Check roles
        if ($data->roles->name != "teacher") {
            return redirect()->route('list_group.index_student');
        }

        return view("content.teacher.study_group.create_study_groups");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_study_groups_teacher(Request $request)
    {
        $request->validate([
            'create_study_groups_title' => 'required',
            'create_study_groups_description' => 'required',
        ]);

        // Get from current session
        $data = Auth::user();

        // Check roles
        if ($data->roles->name != "teacher") {
            return redirect()->route('list_group.index_student');
        }

        $utility = new Utility();

        // Set data to api
        DetailGroups::create([
            'uid' => $utility->get_uuid(),
            'title' => $request->create_study_groups_title,
            'description' => $request->create_study_groups_description,
            'owner_id' => $data->uid
        ]);

        return redirect()->route('list_group.index_teacher')->with(['success' => 'Sukses membuat group']);
    }

    public function invite_study_groups_teacher(Request $request, $id)
    {
        $request->validate([
            'invite_student_tags' => 'required'
        ]);

        // Get from current session
        $data = Auth::user();

        // Check roles
        if ($data->roles->name != "teacher") {
            return redirect()->route('list_group.index_student');
        }

        // Check if user tag is exists
        $check_user = User::with('roles')
            ->where('tag', $request->invite_student_tags);

        // Validate
        if (!$check_user->exists())
            return back()->with(['error' => 'User not found']);

        $check_user = $check_user->first();

        // Check user roles
        if ($check_user->roles->name == 'teacher') {
            return back()->with(['error' => 'User roles is teacher']);
        }

        // Check if user already inside the group or not
        $participant = ListGroups::where('participant_id', $check_user->uid)
            ->where('group_id', $id);

        // Validate
        if ($participant->exists()) {
            return back()->with(['error' => 'User was already inside']);
        }

        // Set to api
        ListGroups::create([
            'group_id' => $id,
            'participant_id' => $check_user->uid,
        ]);

        return back()->with(['success' => 'Berhasil menambahkan user']);
    }

    /**
     * Display the specified resource.
     */
    public function detail_study_groups_teacher($id)
    {
        // Get from current session
        $data = Auth::user();

        // Check roles
        if ($data->roles->name != "teacher") {
            return redirect()->route('list_group.index_student');
        }

        // Get Detail Groups
        $detail_group = DetailGroups::where('uid', $id)
            ->where('owner_id', $data->uid);

        // Validate
        if (!$detail_group->exists()) {
            return redirect()->route('list_group.index_student')->with(['error' => 'Data groups tidak ditemukan']);
        }

        $detail_group = $detail_group->first();
        // Get all participant
        $list_participant = ListGroups::with('participant')->where("group_id", $id);

        return view("content.teacher.study_group.detail_study_groups", [
            'detail_group' => $detail_group,
            'list_participant' => $list_participant->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_study_groups_teacher($id)
    {
        // Get from current session
        $data = Auth::user();

        // Check roles
        if ($data->roles->name != "teacher") {
            return redirect()->route('list_group.index_student');
        }

        // Get Detail Group
        $groups = DetailGroups::where('uid', $id);

        // Validate
        if (!$groups->exists()) {
            return redirect()->route('list_group.index_teacher')->with(['error' => 'Gagal mendapatkan detail group']);
        }

        return view('content.teacher.study_group.edit_study_groups', [
            'group' => $groups->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_study_groups_teacher(Request $request, $id)
    {
        $request->validate([
            'edit_study_groups_title' => 'required',
            'edit_study_groups_description' => 'required'
        ]);

        // Get from current session
        $data = Auth::user();

        // Check roles
        if ($data->roles->name != "teacher") {
            return redirect()->route('list_group.index_student');
        }

        // Get Detail Group
        $groups = DetailGroups::where('uid', $id);

        // Check Data
        if ($groups->exists()) {
            $groups = $groups->first();

            $groups->update([
                'title' => $request->edit_study_groups_title,
                'description' => $request->edit_study_groups_description
            ]);

            return redirect()->route('list_group.index_teacher')->with(['success' => 'Sukses mengedit group']);
        }

        return redirect()->route('list_group.index_teacher')->with(['error' => 'Gagal mengedit group']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function teacher_kick_student(Request $request, $id)
    {
        $request->validate([
            'group_id' => 'required'
        ]);

        // Get from current session
        $data = Auth::user();

        // Check roles
        if ($data->roles->name != "teacher") {
            return redirect()->route('list_group.index_student');
        }

        // Get Detail Group
        $groups = ListGroups::where('participant_id', $id)
            ->where('group_id', $request->group_id);

        if ($groups->exists()) {
            $groups = $groups->first();
            $groups->delete();
            return back()->with(['success' => 'Sukses mengeluarkan anggota dari grup']);
        }
        return back()->with(['error' => 'Gagal mengeluarkan anggota dari grup']);
    }
}
