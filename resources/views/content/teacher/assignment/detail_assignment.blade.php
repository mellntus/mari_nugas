@extends('layouts.user.student.main')

@section('title')
    <h3>List Assignment - Detail</h3>
@endsection

@section('content')
    <div class="teacher-detail-assignment-section" style="
    width: 100%;
    height: 100%;
    background: green;
    max-height: 600px;
    overflow-y: auto">
        <div class="teacher-detail-assignment-square" style="background: #F0F0F0; padding: 5%">
            <form action="/teacher/assignment/id/update" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="assignment-id">
                <div class="row teacher-detail-assignment-data py-2">
                    <div class="col-3">
                        <h5>Title</h5>
                    </div>
                    <div class="col-9">
                        <input type="text" id="edit_assignment_title" name="edit_assignment_title" style="width: -webkit-fill-available" placeholder="Lorem Ipsum" value="{{ $assignment->title }}" required>
                    </div>
                </div>
                <div class="row teacher-detail-assignment-data py-2">
                    <div class="col-3">
                        <h5>Description</h5>
                    </div>
                    <div class="col-9">
                        <textarea type="text" id="edit_assignment_description" name="edit_assignment_description" placeholder="Lorem Ipsum" style="width: -webkit-fill-available; max-height: 200px" required>{{ $assignment->description }}</textarea>
                    </div>
                </div>
                <div class="row teacher-detail-assignment-data py-2">
                    <div class="col-3">
                        <h5>Due Date</h5>
                    </div>
                    <div class="col-9">
                        <input type="date" id="edit_assignment_date" name="edit_assignment_date" style="width: -webkit-fill-available" placeholder="Lorem Ipsum" value="{{ $assignment->due_date }}" required>
                    </div>
                </div>
                <div class="row teacher-detail-assignment-data py-2">
                    <div class="col-3">
                        <h5>Sample File</h5>
                    </div>
                    <div class="col-9">
                        @if (empty($assignment->task_sample))
                            -
                        @else    
                            <a href="{{ url('/teacher/assignment/sample/'.$detail_assignment->uid.'/show') }}">
                                File Sample
                            </a>
                        @endif
                    </div>
                </div>
                <div class="row teacher-detail-assignment-data py-2">
                    <div class="col-3">
                        <h5>Study Group</h5>
                    </div>
                    <div class="col-9">
                        <h5>: {{ $assignment->group->title }}</h5>
                    </div>
                </div>
                <div class="row teacher-detail-assignment-data py-2">
                    <div class="col-3">
                        <h5>Sample File (Optional)</h5>
                    </div>
                    <div class="col-9">
                        {{-- FILE --}}
                        <input class="form-control @error('error-file') is-invalid @enderror" type="file"
                        id="teacher_assignment_file" name="teacher_assignment_file">
                        @error('error-file')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col" style="text-align-last: end;">
                    <button class="btn btn-success" type="submit">SAVE</button>
                </div>
            </form>
        </div>
    </div>
@endsection