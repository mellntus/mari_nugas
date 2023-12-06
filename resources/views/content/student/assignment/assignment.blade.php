@extends('layouts.user.student.main')

@section('title')
    <h3>Student Assignment</h3>
@endsection

@section('content')
    <div class="table-assignment">
        <table class="table">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Assignment</th>
                <th scope="col">Group</th>
                <th scope="col">Status</th>
                <th scope="col">Deadline</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                {{-- Foreach Here --}}
                @forelse ($assignments as $assignment)
                    <tr>
                        <th scope="row"></th>
                        <td>{{ $assignment->task->title }}</td>
                        <td>{{ $assignment->group->title }}</td>
                        <td>Not Done</td>
                        <td>{{ $assignment->task->due_date }}</td>                        
                        <td>
                            <div class="d-flex">
                                <a href={{ url('/student/assignment/'.$assignment->task->uid.'/detail') }}>View</a>
                                <a href={{ url('/student/assignment/'.$assignment->task->uid.'/prepare') }}>Submit</a>
                            </div>
                        </td>                        

                    </tr>
                @empty
                <tr>
                    <div class="alert alert-danger">
                        Data assignment belum Tersedia.
                    </div>
                </tr>
                @endforelse
            <tr>
                <th scope="row"></th>
                <td>Lorem Ipsum</td>
                <td style="background-color: green"><strong>Submitted</strong></td>
                <td>2023-12-09</td>
                <td><a href="/student/assignment/id/detail">View</a><span>          <a href="/student/assignment/id/submit">Submit</a></span></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td>Dolored Lamu</td>
                <td style="background-color: red"><strong>Expired</strong></td>
                <td>2023-12-09</td>
                <td><a href="/student/assignment/id/detail">View</a><span>          <a href="/student/assignment/id/submit">Submit</a></span></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td>Skuknu Rekmend</td>
                <td style="background-color: red"><strong>Not Submitted</strong></td>
                <td>2023-12-09</td>
                <td><a href="/student/assignment/id/detail">View</a><span>          <a href="/student/assignment/id/submit">Submit</a></span></td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection