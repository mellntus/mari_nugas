@extends('layouts.user.teacher.main')

@section('title')
    <h3>Notes - Detail</h3>
@endsection

@section('content')
    <div class="notes-detail-section" style="
    width: 100%;
    height: 100%;
    background: green;">
    
        <div class="notes-detail-square" style="background: #F0F0F0; padding: 5%">
            <form action="/notes/id/update" method="POST">
                @csrf
                <div class="row notes-detail py-2">
                    <div class="col-3">
                        <h4>TITLE</h4>
                    </div>
                    <div class="col-9">
                        <input type="text" id="edit-notes-title" name="edit-notes-title" style="width: -webkit-fill-available" required>
                    </div>
                </div>
                <div class="row notes-detail py-2">
                    <div class="col-3">
                        <h4>CONTENT</h4>
                    </div>
                    <div class="col-9">
                        <input id="edit-notes-content" value="Lorem Ipsum Dolor" style="width: -webkit-fill-available" type="hidden" name="edit-notes-content" required>
                        <trix-editor style="max-height: 300px; overflow-y: auto" input="edit-notes-content"></trix-editor>
                    </div>
                </div>
                <div class="col" style="text-align-last: end;">
                    <button class="btn btn-success" type="submit">SAVE</button>
                </div>
            </form>
        </div>
    </div>
@endsection