@extends('layouts.user.student.main')

@section('title')
    <h3>Student Assignment - Detail</h3>
@endsection

@section('content')
    <div class="detail-assignment-section" style="
    width: 100%;
    height: 100%;
    background: green;
    max-height: 600px;
    overflow-y: auto">
        <div class="detail-assignment-square" style="background: #F0F0F0; padding: 5%">
            <div class="row detail-assignment-data py-2">
                <div class="col-3">
                    <h5>Title</h5>
                </div>
                <div class="col-9">
                    <h5>: {{ $detail_assignment->title }}</h5>
                </div>
            </div>
            <div class="row detail-assignment-data py-2">
                <div class="col-3">
                    <h5>Description</h5>
                </div>
                <div class="col-9">
                    <h5>: {{ $detail_assignment->description }}</h5>
                </div>
            </div>
            <div class="row detail-assignment-data py-2">
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
            <div class="row detail-assignment-data py-2">
                <div class="col-3">
                    <h5>Status</h5>
                </div>
                <div class="col-9">
                    <h5>: 
                        @if (empty($current_assignment))
                            Not Submitted
                        @else    
                            Submitted
                        @endif
                    </h5>
                </div>
            </div>
            <div class="row detail-assignment-data py-2">
                <div class="col-3">
                    <h5>Study Group</h5>
                </div>
                <div class="col-9">
                    <h5>: {{ $detail_assignment->group->title }}</h5>
                </div>
            </div>
            <div class="row detail-assignment-data py-2">
                <div class="col-3">
                    <h5>Submitted File</h5>
                </div>
                <div class="col-9">
                    <h5>: 
                        @if (empty($current_assignment))
                            -
                        @else
                            <a href="{{ url('/student/assignment/'.$detail_assignment->uid.'/submitted/'.$current_assignment->user_id.'/download') }}">
                                Submitted File
                            </a>
                        @endif
                    </h5>
                </div>
            </div>
        </div>
    </div>
@endsection