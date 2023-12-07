@extends('layouts.user.student.main')

@section('title')
    <h3>Student Study Groups</h3>
@endsection

@section('content')
    <div class="table-study-groups">
        <table class="table">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Study Groups</th>
                <th scope="col">Participant</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                {{-- Foreach Here --}}
                @forelse ($groups as $group)
                    <tr>
                        <th scope="row"></th>
                        <td>{{ $group->group->title }}</td>
                        <td>{{ $group->total_participant }}</td>
                        <td>
                            <div class="d-flex">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ url('/student/study-groups/'.$group->group_id.'/left') }}" method="POST">
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
                            Data group belum ditemukan.
                        </div>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection