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
            <form action="/teacher/assignment/create" method="post">
                <div class="row teacher-create-assignment-data py-2">
                    <div class="col-3">
                        <h5>Title</h5>
                    </div>
                    <div class="col-9">
                        <input type="text" id="create-assignment-title" name="edit-notes-title" style="width: -webkit-fill-available" required>
                    </div>
                </div>
                <div class="row teacher-create-assignment-data py-2">
                    <div class="col-3">
                        <h5>Description</h5>
                    </div>
                    <div class="col-9">
                        <textarea type="text" id="create-assignment-description" style="width: -webkit-fill-available; max-height: 200px"></textarea>
                    </div>
                </div>
                <div class="row teacher-create-assignment-data py-2">
                    <div class="col-3">
                        <h5>Study Group</h5>
                    </div>
                    <div class="col-9">
                        <select name="-" id="create-assignment-study-groups" style="width: -webkit-fill-available">
                            <option value="1">Volvo</option>
                            <option value="2">Saab</option>
                            <option value="3">Opel</option>
                            <option value="4">Audi</option>
                        </select>
                    </div>
                </div>
                <div class="row teacher-create-assignment-data py-2">
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