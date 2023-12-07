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
                        <td><strong>{{ $assignment->rate_submitted }}</strong></td>
                        <td>{{ $assignment->due_date }}</td>
                        <td>
                            <div class="d-flex">
                                <a href={{ url('/teacher/assignment/'.$assignment->uid.'/detail') }}>View</a>
                                <a href={{ url('/teacher/assignment/'.$assignment->uid.'/status') }}>Status</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <div class="alert alert-danger">
                            Data assignment belum ditemukan.
                        </div>
                    </tr>
                @endforelse
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