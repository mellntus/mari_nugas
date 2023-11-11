@extends('layouts.user.teacher.main')

@section('title')
    <h3>List Assignment</h3>
@endsection

@section('content')
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
            <tr>
                <th scope="row"></th>
                <td>Lorem Ipsum</td>
                <td><strong>43/50</strong></td>
                <td>2023-12-09</td>
                <td><a href="/teacher/assignment/id/detail">View</a><span>          <a href="/teacher/assignment/id/status">Status</a></span></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td>Dolored Lamu</td>
                <td><strong>43/51</strong></td>
                <td>2023-12-09</td>
                <td><a href="/teacher/assignment/id/detail">View</a><span>          <a href="/teacher/assignment/id/status">Status</a></span></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td>Skuknu Rekmend</td>
                <td><strong>43/52</strong></td>
                <td>2023-12-09</td>
                <td><a href="/teacher/assignment/id/detail">View</a><span>          <a href="/teacher/assignment/id/status">Status</a></span></td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection