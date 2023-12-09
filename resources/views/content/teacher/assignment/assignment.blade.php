@extends('layouts.user.teacher.main')

@section('title')
    <h3>List Assignment</h3>
@endsection

@section('content')
    <div class="create-assignment-link">
        <a style="margin-bottom: 15px" href="/teacher/assignment/prepare">Create a new assignment?</a>
    </div>
    <div class="table-assignment">
        <table class="table">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Assignment</th>
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
                        <td>{{ $assignment->title }}</td>
                        <td><strong>{{ $assignment->submitted_participant }}/{{ $assignment->total_participant }}</strong></td>
                        <td>{{ $assignment->due_date }}</td>
                        <td>
                            <a href={{ url('/teacher/assignment/'.$assignment->uid.'/detail') }}>View</a>
                            <a href={{ url('/teacher/assignment/'.$assignment->uid.'/status') }}>Status</a>
                            <a href={{ url('/teacher/assignment/'.$assignment->uid.'/delete') }}>Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <div class="alert alert-danger">
                            Data assignment belum ditemukan.
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