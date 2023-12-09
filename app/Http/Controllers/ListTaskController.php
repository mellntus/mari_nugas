<?php

namespace App\Http\Controllers;

use App\Models\DetailTask;
use App\Models\ListTask;
use App\Models\DetailGroups;
use App\Models\ListGroups;
use App\Utility\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListTaskController extends Controller
{
    // ----------------------------------------
    // Student Section
    /**
     * Student - Show list of assigned task
     */
    public function index_student()
    {
        // Get from current session
        $data = Auth::user();

        // Check roles
        if ($data->roles->name != "student") {
            return redirect()->route('list_assignment.index_teacher');
        }

        // Get all joined groups
        $groups = ListGroups::with(['group'])
            ->where('participant_id', $data->uid)
            ->get();

        // Get all data assignment
        for ($count = 1; $count <= count($groups); $count++) {
            $index = $count - 1;
            // Detail task
            $detail_task = DetailTask::with('group')
                ->where('group_id', $groups[$index]->group_id)
                ->get();

            // Check status submitted assignment
            for ($submit_count = 1; $submit_count <= count($detail_task); $submit_count++) {
                $index_submit = $submit_count - 1;
                // Submitted task
                $submitted_task = ListTask::where('user_id', $data->uid)
                    ->where('task_id', $detail_task[$index_submit]->uid)
                    ->first();
                $detail_task[$index_submit]['status'] = $submitted_task;
            }

            $groups[$index]['task'] = $detail_task;
        }

        // Default student assignment page as dashboard
        return view('content.' . $data->roles->name . '.assignment.assignment', [
            'groups' => $groups
        ]);
    }

    /**
     * Student - Show detail of assignment
     */
    public function show_assignment_student($id)
    {
        // Get from current session
        $data = Auth::user();

        // Check roles
        if ($data->roles->name != "student") {
            return redirect()->route('list_assignment.index_teacher');
        }

        // Get detail assignment
        $detail_assignment = DetailTask::with('group')->where('uid', $id);
        $current_assignment = ListTask::where('task_id', $id)
            ->where('user_id', $data->uid);

        // Check data assignment
        if (!$detail_assignment->exists()) {
            return back()->with(['error' => 'Detail assignment tidak ditemukan']);
        }

        $detail_assignment = $detail_assignment->first();
        $current_assignment = $current_assignment->first();

        return view("content.student.assignment.detail_assignment", [
            'detail_assignment' => $detail_assignment,
            'current_assignment' => $current_assignment
        ]);
    }

    /**
     * Student - Prepare for submit assignment
     */
    public function prepare_assignment_student($id)
    {
        // Get from current session
        $data = Auth::user();

        // Check roles
        if ($data->roles->name != "student") {
            return redirect()->route('list_assignment.index_teacher');
        }

        // Get detail assignment
        $detail_assignment = DetailTask::with('group')->where('uid', $id);
        $current_assignment = ListTask::where('task_id', $id)
            ->where('user_id', $data->uid);

        // Check data assignment
        if (!$detail_assignment->exists()) {
            return back()->with(['error' => 'Detail assignment tidak ditemukan']);
        }

        $detail_assignment = $detail_assignment->first();
        $current_assignment = $current_assignment->first();

        return view("content.student.assignment.submit_assignment", [
            'detail_assignment' => $detail_assignment
        ]);
    }

    /**
     * Student - Submit the assignment
     */
    public function submit_assignment_student(Request $request, $id)
    {
        // Get from current session
        $data = Auth::user();

        // Check roles
        if ($data->roles->name != "student") {
            return redirect()->route('list_assignment.index_teacher');
        }

        $this->validate($request, [
            'student_assignment_file' => 'required|mimes:pdf,doc,docx|max:10000'
        ]);

        // Check assignment assignment
        $is_submit = ListTask::where('user_id', $data->uid)
            ->where('task_id', $id);
        if ($is_submit->exists()) {
            return back()->with(['error' => 'User telah menyelesaikan tugas']);
        }


        $file = $request->file('student_assignment_file');
        $file->storeAs('public/assignment', $file->hashName());

        $utility = new Utility();

        ListTask::create([
            'task_id' => $id,
            'user_id' => $data->uid,
            'file_submitted' => $file->hashName(),
            'submitted_at' => $utility->get_current_time()
        ]);

        return redirect()->route('list_assignment.index_student')->with(['success' => 'Berhasil mengumpulkan tugas']);
    }



    // ----------------------------------------
    // Teacher Section
    /**
     * Display a listing of the resource.
     */
    public function index_teacher()
    {
        // Get from current session
        $data = Auth::user();

        // Check roles
        if ($data->roles->name != "teacher") {
            return redirect()->route('list_assignment.index_student');
        }

        // Get all assignment data
        $assignment = DetailTask::with(['user', 'group'])->get();

        // Get participant and submitted person inside group
        for ($count = 1; $count <= count($assignment); $count++) {
            // Group participant
            $index = $count - 1;
            $current_groups_participant = ListGroups::where('group_id', $assignment[$index]->group->uid);
            $assignment[$index]['total_participant'] = count($current_groups_participant->get());

            // Submitted participant
            $current_submitted_participant = ListTask::where('task_id', $assignment[$index]->uid);
            $assignment[$index]['submitted_participant'] = count($current_submitted_participant->get());
        }


        // Default student assignment page as dashboard
        return view('content.' . $data->roles->name . '.assignment.assignment', [
            'assignments' => $assignment
        ]);
    }

    public function prepare_assignment_teacher()
    {
        // Get from current session
        $data = Auth::user();

        // Check roles
        if ($data->roles->name != "teacher") {
            return redirect()->route('list_assignment.index_student');
        }

        // Get List Created Groups
        $list_groups = DetailGroups::where("owner_id", $data->uid);

        // Default student assignment page as dashboard
        return view('content.teacher.assignment.create_assignment', [
            'list_groups' => $list_groups->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_assignment_teacher(Request $request)
    {
        $request->validate([
            'create_assignment_study_groups' => 'required',
            'create_assignment_title' => 'required',
            'create_assignment_description' => 'required',
            'create_assignment_date' => 'required'
        ]);

        // Get from current session
        $data = Auth::user();

        // Check roles
        if ($data->roles->name != "teacher") {
            return redirect()->route('list_assignment.index_student');
        }

        $sample_file = null;
        // Save file to local copy
        if ($request->hasFile('teacher_assignment_file')) {
            $request->validate([
                'teacher_assignment_file' => 'mimes:pdf,doc,docx|max:10000'
            ]);
            $sample_file = $request->file('teacher_assignment_file');
            $sample_file->storeAs('public/assignment', $sample_file->hashName());
            $sample_file = $sample_file->hashName();
        }

        $utility = new Utility();

        // Set to detail model
        DetailTask::create([
            'uid' => $utility->get_uuid(),
            'owner_id' => $data->uid,
            'group_id' => $request->create_assignment_study_groups,
            'title' => $request->create_assignment_title,
            'description' => $request->create_assignment_description,
            'due_date' => $request->create_assignment_date,
            'task_sample' => $sample_file
        ]);

        return redirect()->route('list_assignment.index_teacher')->with(['success' => 'Berhasil membuat assignment']);
    }

    /**
     * Display the specified resource.
     */
    public function show_assignment_teacher($id)
    {
        // Get from current session
        $data = Auth::user();

        // Check roles
        if ($data->roles->name != "teacher") {
            return redirect()->route('list_assignment.index_student');
        }

        // Get detail assignment
        $detail_assignment = DetailTask::with('group')->where('uid', $id);

        // Check data assignment
        if (!$detail_assignment->exists()) {
            return back()->with(['error' => 'Detail assignment tidak ditemukan']);
        }

        return view("content.teacher.assignment.detail_assignment", [
            'assignment' => $detail_assignment->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_assignment_teacher(Request $request, $id)
    {
        $request->validate([
            'edit_assignment_title' => 'required',
            'edit_assignment_description' => 'required',
            'edit_assignment_date' => 'required'
        ]);

        // Get from current session
        $data = Auth::user();

        $input_file = False;

        // Check roles
        if ($data->roles->name != "teacher") {
            return redirect()->route('list_assignment.index_student');
        }

        // Check if there is assignment file
        if ($request->hasFile('teacher_assignment_file')) {
            $this->validate($request, [
                'teacher_assignment_file' => 'required|mimes:pdf,doc,docx|max:10000',
            ]);
            $file = $request->file('teacher_assignment_file');
            $file->storeAs('public/assignment', $file->getClientOriginalName());
            $input_file = True;
        }

        // Get detail assignment
        $detail_assignment = DetailTask::where('uid', $id);

        // Check data assignment
        if (!$detail_assignment->exists()) {
            return back()->with(['error' => 'Detail assignment tidak ditemukan']);
        }

        $detail_assignment = $detail_assignment->first();

        if ($input_file == True) {
            $detail_assignment->update([
                'title' => $request->edit_assignment_title,
                'description' => $request->edit_assignment_description,
                'due_date' => $request->edit_assignment_date,
                'task_sample' => $file->getClientOriginalName()
            ]);
        } else {
            $detail_assignment->update([
                'title' => $request->edit_assignment_title,
                'description' => $request->edit_assignment_description,
                'due_date' => $request->edit_assignment_date
            ]);
        }

        return redirect()->route('list_assignment.index_teacher')->with(['success' => 'Berhasil mengubah tugas']);
    }

    public function status_assignment_teacher($id)
    {
        // Get from current session
        $data = Auth::user();

        // Check roles
        if ($data->roles->name != "teacher") {
            return redirect()->route('list_assignment.index_student');
        }

        // Get all groups participant
        $participant = ListTask::with('user')->where('task_id', $id)->get();

        return view("content.teacher.assignment.status_assignment", [
            'participants' => $participant
        ]);
    }

    public function delete_assignment_teacher($id)
    {
        // Get from current session
        $data = Auth::user();

        // Check roles
        if ($data->roles->name != "teacher") {
            return redirect()->route('list_assignment.index_student');
        }

        // Get all groups participant
        $assignment = DetailTask::where('uid', $id);

        if (!$assignment->exists()) {
            return back()->with(['error' => 'Gagal menghapus assignment']);
        }

        //delete post
        $assignment->delete();
        return redirect()->route('list_assignment.index_teacher')->with(['success' => 'Berhasil menghapus assignment']);
    }

    public function show_file_submitted($task_id, $participant_id)
    {
        $pdf = ListTask::where('task_id', $task_id)
            ->where('user_id', $participant_id)->first();

        // $response = Response::make($pdf->file_submitted, 200);
        // $response->header('Content-Type', 'application/pdf');
        // $response->header('Content-Disposition', 'inline; filename="' . $pdf->file_submitted . '"');

        // return $response;
        return response()->download(storage_path('app/public/assignment/' . $pdf->file_submitted));
    }

    public function show_file_sample($id)
    {
        $pdf = DetailTask::where('uid', $id)->first();

        // $response = Response::make($pdf->task_sample, 200);
        // $response->header('Content-Type', 'application/pdf');
        // $response->header('Content-Disposition', 'inline; filename="' . $pdf->task_sample . '"');

        // return $response;
        return response()->download(storage_path('app/public/assignment/' . $pdf->task_sample));
    }

    public function download_submitted($task_id, $participant_id)
    {
        $pdf = ListTask::where('task_id', $task_id)
            ->where('user_id', $participant_id)->first();

        // $response = Response::make($pdf->file_submitted, 200);
        // $response->header('Content-Type', 'application/pdf');
        // $response->header('Content-Disposition', 'attachment; filename="' . $pdf->file_submitted . '"');

        // return $response;

        return response()->download(storage_path('app/public/assignment/' . $pdf->file_submitted));
    }

    public function download_sample($id)
    {
        $pdf = DetailTask::where('uid', $id)->first();

        // $response = Response::make($pdf->task_sample, 200);
        // $response->header('Content-Type', 'application/pdf');
        // $response->header('Content-Disposition', 'attachment; filename="' . $pdf->task_sample . '"');

        // return $response;

        return response()->download(storage_path('app/public/assignment/' . $pdf->task_sample));
    }
}
