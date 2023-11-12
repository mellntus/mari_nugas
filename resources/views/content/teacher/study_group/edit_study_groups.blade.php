@extends('layouts.user.teacher.main')

@section('title')
    <h3>Study Groups - Edit</h3>
@endsection

@section('content')
    <div class="teacher-edit-study-groups-section" style="
    width: 100%;
    height: 100%;
    background: green;
    max-height: 600px;
    overflow-y: auto">
        <div class="teacher-edit-study-groups-square" style="background: #F0F0F0; padding: 5%">
            <form action="/teacher/study-groups/id/edit" method="post">
                <div class="row teacher-edit-study-groups-data py-2">
                    <div class="col-3">
                        <h5>Title</h5>
                    </div>
                    <div class="col-9">
                        <input type="text" id="edit-study-groups-title" name="edit-notes-title" style="width: -webkit-fill-available" required>
                    </div>
                </div>
                <div class="row teacher-edit-study-groups-data py-2">
                    <div class="col-3">
                        <h5>Description</h5>
                    </div>
                    <div class="col-9">
                        <textarea name="edit-study-groups-description" id="edit-study-groups-description" style="width: -webkit-fill-available; max-height: 200px"></textarea>
                    </div>
                </div>
                <div class="col" style="text-align-last: end;">
                    <button class="btn btn-success" type="submit">SAVE</button>
                </div>
            </form>
        </div>
    </div>
@endsection