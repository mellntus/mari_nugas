@extends('layouts.user.main')

@section('title')
    <h3>Notes</h3>
@endsection

@section('content')
<div class="table-notes">
    <table class="table">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            {{-- Foreach Here --}}
        <tr>
            <th scope="row"></th>
            <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</td>
            <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</td>
            <td><a href="#">View</a><span></td>
        </tr>
        <tr>
            <th scope="row"></th>
            <td>Lorem Ipsum</td>
            <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</td>
            <td><a href="#">View</a><span></td>    
        </tr>
        <tr>
            <th scope="row"></th>
            <td>Lorem Ipsum</td>
            <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</td>
            <td><a href="#">View</a><span></td>    
        </tr>
        </tbody>
    </table>
</div>
@endsection