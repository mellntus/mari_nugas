@extends('layouts.user.teacher.main')

@section('title')
    <h3>Status Assignment</h3>
@endsection

@section('content')
    <div class="table-status-assignment">
        <table class="table">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Student</th>
                <th scope="col">Status</th>
                <th scope="col">Deadline</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                {{-- Foreach Here --}}
            <tr>
                <th scope="row"></th>
                <td>Lorem Ipsum</td>
                <td style="background-color: green"><strong>Submitted</strong></td>
                <td>2023-12-09</td>
                <td><a href="/teacher/assignment/id/status/student">View</a></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td>Dolored Lamu</td>
                <td style="background-color: green"><strong>Submitted</strong></td>
                <td>2023-12-09</td>
                <td><a href="/teacher/assignment/id/status/student">View</a></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td>Skuknu Rekmend</td>
                <td style="background-color: green"><strong>Submitted</strong></td>
                <td>2023-12-09</td>
                <td><a href="/teacher/assignment/id/status/student">View</a></td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection