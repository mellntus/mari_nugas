@extends('layouts.user.student.main')

@section('title')
    <h3>Student Assignment - Submit</h3>
@endsection

@section('content')
    <div class="submit-assignment-section" style="
    width: 100%;
    height: 100%;
    background: green;
    max-height: 600px;
    overflow-y: auto">
        <div class="submit-assignment-square" style="background: #F0F0F0; padding: 5%">
            <form action="/student/assignment/id/submit" method="post">
                <input type="hidden" name="assignment-id">
                <div class="row submit-assignment-data py-2">
                    <div class="col-3">
                        <h5>Title</h5>
                    </div>
                    <div class="col-9">
                        <h5>: Lorem Ipsum</h5>
                    </div>
                </div>
                <div class="row submit-assignment-data py-2">
                    <div class="col-3">
                        <h5>Description</h5>
                    </div>
                    <div class="col-9">
                        <h5>: Lorem Ipsum Doloreds</h5>
                    </div>
                </div>
                <div class="row submit-assignment-data py-2">
                    <div class="col-3">
                        <h5>Sample File</h5>
                    </div>
                    <div class="col-9">
                        <h5>: 
                            <a href="">
                                File here
                            </a>
                        </h5>
                    </div>
                </div>
                <div class="row submit-assignment-data py-2">
                    <div class="col-3">
                        <h5>Status</h5>
                    </div>
                    <div class="col-9">
                        <h5>: Submitted</h5>
                    </div>
                </div>
                <div class="row submit-assignment-data py-2">
                    <div class="col-3">
                        <h5>Study Group</h5>
                    </div>
                    <div class="col-9">
                        <h5>: Meong Group</h5>
                    </div>
                </div>
                <div class="row submit-assignment-data py-2">
                    <div class="col-3">
                        <h5>Submitted File</h5>
                    </div>
                    <div class="col-9">
                        {{-- FILE --}}
                        <input class="form-control @error('error-file') is-invalid @enderror" type="file"
                        id="student_assignment_file" name="student_assignment_file" required>
                        @error('error-file')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col" style="text-align-last: end;">
                    <button class="btn btn-success" type="submit">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
@endsection