@extends('layouts.user.main')

@section('title')
    <h3>Student Study Groups</h3>
@endsection

@section('content')
    <div class="table-assignment">
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
                <td><a href="/student/study-groups/id/left">Left</a><span>
            </tr>
            <tr>
                <th scope="row"></th>
                <td>Lorem Ipsum</td>
                <td>12</td>
                <td><a href="/student/study-groups/id/left">Left</a><span>
            </tr>
            <tr>
                <th scope="row"></th>
                <td>Lorem Ipsum</td>
                <td>12</td>
                <td><a href="/student/study-groups/id/left">Left</a><span>
            </tr>
            </tbody>
        </table>
    </div>
@endsection