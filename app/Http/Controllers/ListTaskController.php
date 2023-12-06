<?php

namespace App\Http\Controllers;

use App\Models\DetailTask;
use App\Models\ListTask;
use App\Http\Requests\StoreListTaskRequest;
use App\Http\Requests\UpdateListTaskRequest;
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
        $detail_assignment = DetailTask::where('uid', $id);

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
        // Validation for student and teacher

        // Default student assignment page as dashboard
        return view('content.teacher.assignment.assignment');
    }

    public function prepare_assignment_teacher()
    {
        // Validation for student and teacher

        // Default student assignment page as dashboard
        return view('content.teacher.assignment.create_assignment');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function submit_assignment_teacher()
    {
        return view("content.teacher.assignment.submit_assignment");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_assignment_teacher(StoreListTaskRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show_assignment_teacher(ListTask $listTask)
    {
        return view("content.teacher.assignment.detail_assignment");
    }

    public function status_assignment_teacher(ListTask $listTask)
    {
        return view("content.teacher.assignment.status_assignment");
    }

    public function detail_status_assignment_teacher(ListTask $listTask)
    {
        return view("content.teacher.assignment.detail_status_assignment");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_assignment_teacher(ListTask $listTask)
    {
        return view("content.student.assignment.submit_assignment");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_assignment_teacher(UpdateListTaskRequest $request, ListTask $listTask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_assignment_teacher(ListTask $listTask)
    {
        //
    }

    public function show_file_submitted($id)
    {
        $pdf = ListTask::find($id);

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

    public function download_submitted($id)
    {
        $pdf = ListTask::find($id);

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
