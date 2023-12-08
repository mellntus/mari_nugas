@extends('layouts.user.teacher.main')

@section('title')
    <h3>List Study Groups</h3>
@endsection

@section('content')
    <div class="create-study-groups-link">
        <a style="margin-bottom: 15px" href="/teacher/study_groups/prepare">Create a new study groups?</a>
    </div>
    <div class="table-study-groups">
        <table class="table">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Study Groups</th>
                <th scope="col">Participant</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                {{-- Foreach Here --}}
                @forelse ($list_groups as $group)
                    <tr>
                        <th scope="row"></th>
                        <td>{{ $group->title }}</td>
                        <td><strong>{{ $group->total_participant }}</strong></td>
                        <td>
                            <div>
                                <a href={{ url('/teacher/study_groups/'.$group->uid.'/detail') }}>View</a>       
                                <a href={{ url('/teacher/study_groups/'.$group->uid.'/edit') }}>Edit</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <div class="alert alert-danger">
                            Data group belum ditemukan.
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