<?php

namespace App\Http\Controllers;

use App\Models\DetailTask;
use App\Models\ListTask;
use App\Models\DetailGroups;
use App\Models\ListGroups;
use App\Utility\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

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

        // Get all assignment data
        $assignment = ListTask::with(['user', 'task', 'group'])->get();

        // Default student assignment page as dashboard
        return view('content.' . $data->roles->name . '.assignment.assignment', [
            'assignments' => $assignment
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
        $detail_assignment = DetailTask::where('uid', $id);
        $current_assignment = ListTask::where('task_id', $id);

        // Check data assignment
        if (!$detail_assignment->exists() || !$current_assignment->exists()) {
            return redirect()->route('list_assignment.index_student')->with(['error', 'Detail assignment tidak ditemukan']);
        }

        $detail_assignment = DetailTask::with(['user', 'group'])->where('uid', $id)->first();
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
        $detail_assignment = DetailTask::where('uid', $id);

        // Check data assignment
        if (!$detail_assignment->exists()) {
            return redirect()->route('list_assignment.index_student')->with(['error', 'Detail assignment tidak ditemukan']);
        }

        $detail_assignment = DetailTask::with(['user', 'group'])->where('uid', $id)->first();

        return view("content.student.assignment.submit_assignment", [
            'detail_assignment' => $detail_assignment
        ]);
    }

    /**
     * Student - Submit the assignment
     */
    public function update_assignment_student(Request $request, $id)
    {
        // Get from current session
        $data = Auth::user();

        // Check roles
        if ($data->roles->name != "student") {
            return redirect()->route('list_assignment.index_teacher');
        }

        $this->validate($request, [
            'student_assignment_file'     => 'required|mimes:pdf|max:10000',
        ]);

        // Get detail assignment
        $detail_assignment = ListTask::where('uid', $id);

        // Check data assignment
        if (!$detail_assignment->exists()) {
            return redirect()->route('list_assignment.index_student')->with(['error', 'Detail assignment tidak ditemukan']);
        }

        $utility = new Utility();

        $detail_assignment = $detail_assignment->first();
        $detail_assignment->update([
            'file_submitted' => $request->student_assignment_file,
            'submitted_at' => $utility->get_current_time()
        ]);

        return redirect()->route('list_assignment.index_student')->with(['success', 'Berhasil mengumpulkan tugas']);
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

        // Default student assignment page as dashboard
        return view('content.' . $data->roles->name . '.assignment.assignment', [
            'assignments' => $assignment
        ]);

        // Default student assignment page as dashboard
        return view('content.teacher.assignment.assignment');
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
            'list_groups' => $list_groups
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_assignment_teacher(Request $request)
    {
        // Get from current session
        $data = Auth::user();

        // Check roles
        if ($data->roles->name != "teacher") {
            return redirect()->route('list_assignment.index_student');
        }

        // Save file to local copy
        $sample_file = $request->file('teacher_assignment_file');
        $sample_file->storeAs('public/blogs', $sample_file);

        $utility = new Utility();

        // Set to detail model
        DetailTask::create([
            'uid' => $utility->get_uuid(),
            'owner_id' => $data->uid,
            'group_id' => $request->create_assignment_study,
            'title' => $request->create_assignment_title,
            'description' => $request->create_assignment_description,
            'due_date' => $request->create_assignment_date,
            'task_sample' => $sample_file
        ]);

        return view("content.teacher.assignment.submit_assignment");
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
            return redirect()->route('list_assignment.index_student')->with(['error', 'Detail assignment tidak ditemukan']);
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
                'teacher_assignment_file' => 'mimes:pdf|max:10000',
            ]);
            $input_file = True;
        }

        // Get detail assignment
        $detail_assignment = DetailTask::where('uid', $id);

        // Check data assignment
        if (!$detail_assignment->exists()) {
            return redirect()->route('list_assignment.index_teacher')->with(['error', 'Detail assignment tidak ditemukan']);
        }

        $detail_assignment = $detail_assignment->first();

        if ($input_file == True) {
            $detail_assignment->update([
                'title' => $request->edit_assignment_title,
                'description' => $request->edit_assignment_description,
                'due_date' => $request->edit_assignment_date,
                'task_sample' => $request->file('teacher_assignment_file')
            ]);
        } else {
            $detail_assignment->update([
                'title' => $request->edit_assignment_title,
                'description' => $request->edit_assignment_description,
                'due_date' => $request->edit_assignment_date
            ]);
        }

        return redirect()->route('list_assignment.index_teacher')->with(['success', 'Berhasil mengumpulkan tugas']);
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
        $participant = ListTask::with('user')->where('task_id', $id);

        return view("content.teacher.assignment.status_assignment", [
            'participants' => $participant
        ]);
    }

    public function show_file_submitted($task_id, $participant_id)
    {
        $pdf = ListTask::where(['task_id', $task_id])
            ->where('participant_id', $participant_id)->first();

        $response = Response::make($pdf->file_submitted, 200);
        $response->header('Content-Type', 'application/pdf');
        $response->header('Content-Disposition', 'inline; filename="' . $pdf->image . '"');

        return $response;
    }

    public function show_file_sample($id)
    {
        $pdf = DetailTask::find($id);

        $response = Response::make($pdf->task_sample, 200);
        $response->header('Content-Type', 'application/pdf');
        $response->header('Content-Disposition', 'inline; filename="' . $pdf->image . '"');

        return $response;
    }

    public function download_submitted($task_id, $participant_id)
    {
        $pdf = ListTask::where(['task_id', $task_id])
            ->where('participant_id', $participant_id)->first();

        $response = Response::make($pdf->file_submitted, 200);
        $response->header('Content-Type', 'application/pdf');
        $response->header('Content-Disposition', 'attachment; filename="' . $pdf->image . '"');

        return $response;
    }

    public function download_sample($id)
    {
        $pdf = DetailTask::find($id);

        $response = Response::make($pdf->task_sample, 200);
        $response->header('Content-Type', 'application/pdf');
        $response->header('Content-Disposition', 'attachment; filename="' . $pdf->image . '"');

        return $response;
    }
}
