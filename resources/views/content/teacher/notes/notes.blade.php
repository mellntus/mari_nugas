@extends('layouts.user.teacher.main')

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
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                {{-- Foreach Here --}}
                @forelse ($notes as $note)
                    <tr>
                        <td>{{ $note->title }}</td>
                        <td>{{ $note->description }}</td>
                        <td>{{ $note->created_at }}</td>                        
                        <td>
                            <a href={{ url('/notes/'.$note->uid.'/detail') }}>
                                <button class="btn btn-success" type="submit">View</button></a>
                            <form action={{ url('/notes/'.$note->uid.'/destroy') }} method="POST">
                                <button class="btn btn-danger" type="submit">Delete</button></a>
                            </form>    
                        </td>                        

                    </tr>
                @empty
                    <div class="alert alert-danger">
                        Data Blog belum Tersedia.
                    </div>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection