@extends('layouts.user.teacher.main')

@section('content')
    <h2>Testing List User</h2>
    <hr>
    <div class="table-detail-study-groups" style="overflow-y: auto; overflow-x: auto; max-height: 400px">
        <table class="table">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Uid</th>
                <th scope="col">Roles ID</th>
                <th scope="col">Roles Name</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Tag</th>
                <th scope="col">Created at</th>
            </tr>
        </thead>
        <tbody>
            {{-- Foreach Here --}}
            @forelse ($list_user as $user)
                <tr>
                    <th scope="row"></th>
                    <td>{{ $user->uid}}</td>
                    <td>{{ $user->roles_id}}</td>
                    <td>{{ $user->roles->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->password }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->tag }}</td>
                    <td>{{ $user->created_at }}</td>
                </tr>
            @empty
                <div class="alert alert-danger">
                    Data Post belum Tersedia.
                </div>
            @endforelse
            
            </tbody>
        </table>
    </div>
@endsection