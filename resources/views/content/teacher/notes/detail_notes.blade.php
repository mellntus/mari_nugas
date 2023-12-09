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
            <form action="{{ url('/notes/'. $note->uid .'/update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row notes-detail py-2">
                    <div class="col-3">
                        <h4>TITLE</h4>
                    </div>
                    <div class="col-9">
                        <input type="text" id="edit_notes_title" @error('edit_notes_title') is-invalid @enderror name="edit_notes_title" style="width: -webkit-fill-available" value="{{ $note->title }}" required>
                    </div>
                </div>
                <div class="row notes-detail py-2">
                    <div class="col-3">
                        <h4>CONTENT</h4>
                    </div>
                    <div class="col-9">
                        <input id="edit_notes_content" value="{{ $note->description }}"  @error('edit_notes_content') is-invalid @enderror style="width: -webkit-fill-available" type="hidden" name="edit_notes_content" required>
                        <trix-editor style="max-height: 300px; overflow-y: auto" input="edit_notes_content"></trix-editor>
                    </div>
                </div>
                <div class="col" style="text-align-last: end;">
                    <button class="btn btn-success" type="submit">SAVE</button>
                </div>
            </form>
            <!-- error message untuk title -->
            @error('edit_notes_title')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
            @error('edit_notes_content')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
@endsection