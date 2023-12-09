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
                @forelse ($groups as $group)
                    @forelse ($group['task'] as $task)  
                        <tr>
                            <th scope="row"></th>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->group->title }}</td>
                            @if (empty($task->status->file_submitted))
                                <td style="background-color: red">
                                    <strong>Not Submitted</strong>
                                </td>
                            @else    
                                <td style="background-color: green">
                                    <strong>Submitted</strong>
                                </td>
                            @endif
                            </td>
                            <td>{{ $task->due_date }}</td>                        
                            <td>
                                <a href={{ url('/student/assignment/'.$task->uid.'/detail') }}>View</a>
                                @if (empty($task->status->file_submitted))
                                    <a href={{ url('/student/assignment/'.$task->uid.'/prepare') }}>Submit</a>
                                @endif
                            </td>                        
                        </tr>
                    @empty
                    @endforelse
                @empty
                <tr>
                    <div class="alert alert-danger">
                        Data assignment belum Tersedia.
                    </div>
                </tr>
                @endforelse
            </tbody>
        </table>
        @if (session()->has('success'))
            <div class="alert alert-success  fade show" role="alert" style="display: flex; justify-content: space-between">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger fade show" role="alert" style="display: flex; justify-content: space-between">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
@endsection