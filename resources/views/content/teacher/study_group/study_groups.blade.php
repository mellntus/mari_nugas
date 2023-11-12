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
            <tr>
                <th scope="row"></th>
                <td>Lorem Ipsum</td>
                <td>12</td>
                <td><a href="/teacher/study-groups/id/detail">View</a><span>
            </tr>
            <tr>
                <th scope="row"></th>
                <td>Lorem Ipsum</td>
                <td>12</td>
                <td><a href="/teacher/study-groups/id/detail">View</a><span>
            </tr>
            <tr>
                <th scope="row"></th>
                <td>Lorem Ipsum</td>
                <td>12</td>
                <td><a href="/teacher/study-groups/id/detail">View</a><span>
            </tr>
            </tbody>
        </table>
    </div>
@endsection