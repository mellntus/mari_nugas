@extends('layouts.user.teacher.main')

@section('title')
    <h3>Study Groups - Create</h3>
@endsection

@section('content')
    <div class="teacher-create-study-groups-section" style="
    width: 100%;
    height: 100%;
    background: green;
    max-height: 600px;
    overflow-y: auto">
        <div class="teacher-create-study-groups-square" style="background: #F0F0F0; padding: 5%">
            <form action="{{ url('/teacher/study_groups/create') }}" method="POST">
                @csrf
                <div class="row teacher-create-study-groups-data py-2">
                    <div class="col-3">
                        <h5>Title</h5>
                    </div>
                    <div class="col-9">
                        <input type="text" id="create_study_groups_title" name="create_study_groups_title" style="width: -webkit-fill-available" required>
                    </div>
                </div>
                <div class="row teacher-create-study-groups-data py-2">
                    <div class="col-3">
                        <h5>Description</h5>
                    </div>
                    <div class="col-9">
                        <textarea name="create_study_groups_description" id="create_study_groups_description" style="width: -webkit-fill-available; max-height: 200px"></textarea>
                    </div>
                </div>
                <div class="col" style="text-align-last: end;">
                    <button class="btn btn-success" type="submit">CREATE</button>
                </div>
            </form>
        </div>
    </div>
@endsection