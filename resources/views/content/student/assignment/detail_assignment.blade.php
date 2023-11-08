@extends('layouts.user.main')

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
                    <h5>: Lorem Ipsum</h5>
                </div>
            </div>
            <div class="row detail-assignment-data py-2">
                <div class="col-3">
                    <h5>Description</h5>
                </div>
                <div class="col-9">
                    <h5>: Lorem Ipsum Doloreds</h5>
                </div>
            </div>
            <div class="row detail-assignment-data py-2">
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
            <div class="row detail-assignment-data py-2">
                <div class="col-3">
                    <h5>Status</h5>
                </div>
                <div class="col-9">
                    <h5>: Submitted</h5>
                </div>
            </div>
            <div class="row detail-assignment-data py-2">
                <div class="col-3">
                    <h5>Study Group</h5>
                </div>
                <div class="col-9">
                    <h5>: Meong Group</h5>
                </div>
            </div>
            <div class="row detail-assignment-data py-2">
                <div class="col-3">
                    <h5>Submitted File</h5>
                </div>
                <div class="col-9">
                    <h5>: 
                        <a href="">
                            File here
                        </a>
                    </h5>
                </div>
            </div>
        </div>
    </div>
@endsection