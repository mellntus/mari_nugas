@extends('layouts.user.teacher.main')

@section('title')
    <h3>List Study Groups</h3>
@endsection

@section('content')
    <div class="create-study-groups-link">
        <a style="margin-bottom: 15px" href="/teacher/study-groups/prepare">Create a new study groups?</a>
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
                        <td><strong>{{ $group->participant }}</strong></td>
                        <td>
                            <div class="d-flex">
                                <a href={{ url('/teacher/study-groups/'.$group->uid.'/detail') }}>View</a>
                                <a href={{ url('/teacher/study-groups/'.$group->uid.'/edit') }}>Edit</a>
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
    </div>
@endsection