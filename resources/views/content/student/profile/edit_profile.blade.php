@extends('layouts.user.student.main')

@section('title')
    <h3>Edit Profile</h3>
@endsection

@section('content')
    <div class="profile-section" style="
        width: 100%;
        height: 100%;
        background: green;
        margin-top: 5%; 
        margin-bottom: 15%">
        <div class="profile-square" style="background: #F0F0F0; padding: 5%">
            <form action="{{ url('/profile/update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row profile-detail py-2">
                    <div class="col-3">
                        <h4>EMAIL</h4>
                    </div>
                    <div class="col-9">
                        <input type="text" id="profile_email" name="profile_email" style="width: -webkit-fill-available" value="{{ $user->email }}" required>
                    </div>
                </div>
                <div class="row profile-detail py-2">
                    <div class="col-3">
                        <h4>USERNAME</h4>
                    </div>
                    <div class="col-9">
                        <input type="text" id="profile_username" name="profile_username" style="width: -webkit-fill-available" value="{{ $user->username }}" required>
                    </div>
                </div>
                <div class="row profile-detail py-2">
                    <div class="col-3">
                        <h4>ADDRESS</h4>
                    </div>
                    <div class="col-9">
                        <textarea id="profile_address" name="profile_address" style="width: -webkit-fill-available; max-height: 200px" required>{{ $user->address }}</textarea>
                    </div>
                </div>
                <div class="row profile-detail py-2">
                    <div class="col-3">
                        <h4>ROLES</h4>
                    </div>
                    <div class="col-9">
                        <h4>: {{ $user->roles->name }}</h4>
                    </div>
                </div>
                <div class="row profile-detail py-2">
                    <div class="col-3">
                        <h4>TAG</h4>
                    </div>
                    <div class="col-9">
                        <h4>: {{ $user->tag }}</h4>
                    </div>
                </div>
                <div class="col" style="text-align-last: end;">
                    <button class="btn btn-success" type="submit">SAVE</button>
                </div>
            </form>
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
    </div>
@endsection