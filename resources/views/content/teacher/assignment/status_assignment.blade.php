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
                <th scope="col">File</th>
                <th scope="col">Submitted At</th>
            </tr>
            </thead>
            <tbody>
                {{-- Foreach Here --}}
                @forelse ($participants as $participant)
                    <tr>
                        <th scope="row"></th>
                        <td>{{ $participant->user->name }}</td>
                        <td><a href="{{ url('/teacher/assignment/'.$participant->task_id.'/submitted/'.$participant->participant_id.'/download') }}">
                            {{ $participant->file_submitted }}
                        </a></td>
                        <td>{{ $participant->submitted_at }}</td>
                    </tr>
                @empty
                <tr>
                    <div class="alert alert-danger">
                        Pengumpulan assignment belum tersedia.
                    </div>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection