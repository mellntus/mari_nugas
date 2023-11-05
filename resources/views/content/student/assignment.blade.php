@extends('layouts.user.main')

@section('title')
    <h3>Assignment</h3>
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
                <td style="background-color: green"><strong>Submitted</strong></td>
                <td>2023-12-09</td>
                <td><a href="#">View</a><span>  <a href="#">Submit</a></span></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td>Dolored Lamu</td>
                <td style="background-color: red"><strong>Expired</strong></td>
                <td>2023-12-09</td>
                <td><a href="#">View</a><span>  <a href="#">Submit</a></span></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td>Skuknu Rekmend</td>
                <td style="background-color: red"><strong>Not Submitted</strong></td>
                <td>2023-12-09</td>
                <td><a href="#">View</a><span>  <a href="#">Submit</a></span></td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection