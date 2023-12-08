@extends('layouts.user.teacher.main')

@section('title')
    <h3>Notes - Create</h3>
@endsection

@section('content')
    <div class="notes-create-section" style="
    width: 100%;
    height: 100%;
    background: green;">
    
        <div class="notes-create-square" style="background: #F0F0F0; padding: 5%">
            <form action="/notes/create" method="POST">
                @csrf
                <div class="row notes-create py-2">
                    <div class="col-3">
                        <h4>TITLE</h4>
                    </div>
                    <div class="col-9">
                        <input type="text" id="create_notes_title" name="create_notes_title" style="width: -webkit-fill-available" required>
                    </div>
                </div>
                <div class="row notes-create py-2">
                    <div class="col-3">
                        <h4>CONTENT</h4>
                    </div>
                    <div class="col-9">
                        <input id="create_notes_content" placeholder="Lorem Ipsum" style="width: -webkit-fill-available" type="hidden" name="create_notes_content" required>
                        <trix-editor style="max-height: 300px; overflow-y: auto" input="create_notes_content"></trix-editor>
                    </div>
                </div>
                <div class="col" style="text-align-last: end;">
                    <button class="btn btn-success" type="submit">SAVE</button>
                </div>
            </form>
        </div>
    </div>
@endsection