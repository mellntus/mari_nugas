@extends('layouts.user.teacher.main')

@section('title')
    <h3>Detail Study Groups</h3>
@endsection

@section('content')
    <div class="row study-groups-description mb-4">
        <div class="col-2">
            <h6><strong>Description</strong></h6>
        </div>
        <div class="col-10">
            <p style="margin: 0">Lorem Ipsum DoloresLorem Ipsum DoloresLorem Ipsum DoloresLorem Ipsum DoloresLorem Ipsum DoloresLorem Ipsum Dolores Lorem Ipsum DoloresLorem Ipsum DoloresLorem Ipsum DoloresLorem Ipsum DoloresLorem Ipsum DoloresLorem Ipsum DoloresLorem Ipsum DoloresLorem Ipsum DoloresLorem Ipsum DoloresLorem Ipsum DoloresLorem Ipsum DoloresLorem Ipsum DoloresLorem Ipsum Dolores</p>
            <a href="/teacher/study-groups/id/edit">Edit Description</a>
        </div>
    </div>
    <form action="/teacher/study-groups/id/invite">
        <div class="d-flex study-groups-invite"  style="align-items: center">
            <div class="tag-title">
                <h6><strong>TAG</strong></h6>
            </div>
            <div class="tag-input mx-3">
                <input type="text" id="invite-student-tags">
            </div>
            <div class="tag-button">
                <button class="btn btn-success" type="submit">ADD</button>
            </div>
        </div>
    </form>
    <div class="table-detail-study-groups" style="overflow-y: auto; max-height: 400px">
        <table class="table">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Student</th>
                <th scope="col">Nickname</th>
                <th scope="col">Tag</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                {{-- Foreach Here --}}
            <tr>
                <th scope="row"></th>
                <td>Lorem Ipsum</td>
                <td>Tus</td>
                <td><strong>LI</strong></td>
                <td><a href="/teacher/study-groups/id/detail/id/kick">KICK</a></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td>Lorem Ipsum</td>
                <td>Tus</td>
                <td><strong>LI</strong></td>
                <td><a href="/teacher/study-groups/id/detail/id/kick">KICK</a></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td>Lorem Ipsum</td>
                <td>Tus</td>
                <td><strong>LI</strong></td>
                <td><a href="/teacher/study-groups/id/detail/id/kick">KICK</a></td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection