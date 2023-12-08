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
            <form action="{{ url('/teacher/study_groups/'.$group->uid.'/update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row teacher-edit-study-groups-data py-2">
                    <div class="col-3">
                        <h5>Title</h5>
                    </div>
                    <div class="col-9">
                        <input type="text" id="edit_study_groups_title" name="edit_study_groups_title" style="width: -webkit-fill-available" value="{{ $group->title }}" required>
                    </div>
                </div>
                <div class="row teacher-edit-study-groups-data py-2">
                    <div class="col-3">
                        <h5>Description</h5>
                    </div>
                    <div class="col-9">
                        <textarea name="edit_study_groups_description" id="edit_study_groups_description" style="width: -webkit-fill-available; max-height: 200px" required>{{ $group->description }}</textarea>
                    </div>
                </div>
                <div class="col" style="text-align-last: end;">
                    <button class="btn btn-success" type="submit">SAVE</button>
                </div>
            </form>
        </div>
    </div>
@endsection