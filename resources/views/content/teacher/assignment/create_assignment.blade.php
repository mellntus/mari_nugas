@extends('layouts.user.teacher.main')

@section('title')
    <h3>List Assignment - Detail</h3>
@endsection

@section('content')
    <div class="teacher-create-assignment-section" style="
    width: 100%;
    height: 100%;
    background: green;
    max-height: 600px;
    overflow-y: auto">
        <div class="teacher-create-assignment-square" style="background: #F0F0F0; padding: 5%">
            <form action="/teacher/assignment/create" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row teacher-create-assignment-data py-2">
                    <div class="col-3">
                        <h5>Title</h5>
                    </div>
                    <div class="col-9">
                        <input type="text" id="create_assignment_title" name="create_assignment_title" style="width: -webkit-fill-available" placeholder="Lorem Ipsum" required>
                    </div>
                </div>
                <div class="row teacher-create-assignment-data py-2">
                    <div class="col-3">
                        <h5>Description</h5>
                    </div>
                    <div class="col-9">
                        <textarea type="text" id="create_assignment_description" name="create_assignment_description" placeholder="Lorem Ipsum" style="width: -webkit-fill-available; max-height: 200px" required></textarea>
                    </div>
                </div>
                <div class="row teacher-create-assignment-data py-2">
                    <div class="col-3">
                        <h5>Due Date</h5>
                    </div>
                    <div class="col-9">
                        <input type="date" id="create_assignment_date" name="create_assignment_date" style="width: -webkit-fill-available" placeholder="Lorem Ipsum" required>
                    </div>
                </div>
                <div class="row teacher-create-assignment-data py-2">
                    <div class="col-3">
                        <h5>Study Group</h5>
                    </div>
                    <div class="col-9">
                        <select id="create_assignment_study_groups" name="create_assignment_study_groups" style="width: -webkit-fill-available" required>
                            @forelse ($list_groups as $group)
                                <option value="{{ $group->uid }}">{{ $group->title }}</option>
                            @empty
                                <option value="">No Groups Created</option>
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="row teacher-create-assignment-data py-2">
                    <div class="col-3">
                        <h5>Sample File (Optional)</h5>
                    </div>
                    <div class="col-9">
                        {{-- FILE --}}
                        <input class="form-control @error('teacher_assignment_file') is-invalid @enderror" type="file"
                        id="teacher_assignment_file" name="teacher_assignment_file">
                        @error('teacher_assignment_file')
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