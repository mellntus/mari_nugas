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
            <form action="{{ url('/student/assignment/'.$detail_assignment->uid.'/submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="row submit-assignment-data py-2">
                    <div class="col-3">
                        <h5>Title</h5>
                    </div>
                    <div class="col-9">
                        <h5>: {{ $detail_assignment->title }}</h5>
                    </div>
                </div>
                <div class="row submit-assignment-data py-2">
                    <div class="col-3">
                        <h5>Description</h5>
                    </div>
                    <div class="col-9">
                        <h5>: {{ $detail_assignment->description }}</h5>
                    </div>
                </div>
                <div class="row submit-assignment-data py-2">
                    <div class="col-3">
                        <h5>Sample File</h5>
                    </div>
                    <div class="col-9">
                        <h5>: 
                            @if (empty($detail_assignment->task_sample))
                                -
                            @else    
                                <a href="{{ url('/student/assignment/sample/'.$detail_assignment->uid.'/show') }}">
                                    File Sample
                                </a>
                            @endif
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
                        <h5>: {{ $detail_assignment->group->title }}</h5>
                    </div>
                </div>
                <div class="row submit-assignment-data py-2">
                    <div class="col-3">
                        <h5>Submitted File</h5>
                    </div>
                    <div class="col-9">
                        {{-- FILE --}}
                        <input type="file" class="form-control @error('student_assignment_file') is-invalid @enderror" name="student_assignment_file" required>
                        <!-- error message untuk title -->
                        @error('student_assignment_file')
                            <div class="alert alert-danger mt-2">
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