@extends('layouts.user.student.main')

@section('title')
    <h3>Notes</h3>
@endsection

@section('content')
    <div class="create-notes-link">
        <a style="margin-bottom: 15px" href="/notes/prepare">Create a new notes?</a>
    </div>
    <div class="table-notes">
        <table class="table">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Create At</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                {{-- Foreach Here --}}
                @forelse ($notes as $note)
                    <tr>
                        <td></td>
                        <td>{{ $note->title }}</td>
                        <td>{{ $note->description }}</td>
                        <td>{{ $note->created_at }}</td>                        
                        <td>
                            <div class="d-flex">
                                <a href={{ url('/notes/'.$note->uid.'/detail') }}>
                                    <button class="btn btn-success" type="submit">View</button></a>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ url('/notes/'.$note->uid.'/destroy') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button></a>
                                </form>    
                            </div>
                        </td>                        

                    </tr>
                @empty
                <tr>
                    <div class="alert alert-danger">
                        Data notes belum Tersedia.
                    </div>
                </tr>
                @endforelse
            </tbody>
        </table>
        @if (session()->has('success'))
            <div class="alert alert-success  fade show" role="alert" style="display: flex; justify-content: space-between">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger fade show" role="alert" style="display: flex; justify-content: space-between">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
@endsection