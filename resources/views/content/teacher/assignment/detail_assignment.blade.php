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
                <input type="hidden" name="assignment-id">
                <div class="row teacher-detail-assignment-data py-2">
                    <div class="col-3">
                        <h5>Title</h5>
                    </div>
                    <div class="col-9">
                        <h5>: Lorem Ipsum</h5>
                    </div>
                </div>
                <div class="row teacher-detail-assignment-data py-2">
                    <div class="col-3">
                        <h5>Description</h5>
                    </div>
                    <div class="col-9">
                        <h5>: Lorem Ipsum Doloreds</h5>
                    </div>
                </div>
                <div class="row teacher-detail-assignment-data py-2">
                    <div class="col-3">
                        <h5>Sample File</h5>
                    </div>
                    <div class="col-9">
                        <h5>: 
                            -
                            {{-- <a href="">
                                File here
                            </a> --}}
                        </h5>
                    </div>
                </div>
                <div class="row teacher-detail-assignment-data py-2">
                    <div class="col-3">
                        <h5>Study Group</h5>
                    </div>
                    <div class="col-9">
                        <h5>: Meong Group</h5>
                    </div>
                </div>
                <div class="row teacher-detail-assignment-data py-2">
                    <div class="col-3">
                        <h5>Sample File (Optional)</h5>
                    </div>
                    <div class="col-9">
                        {{-- FILE --}}
                        <input class="form-control @error('error-file') is-invalid @enderror" type="file"
                        id="teacher-assignment-file" name="teacher-assignment-file" required>
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