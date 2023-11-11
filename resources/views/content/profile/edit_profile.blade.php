@extends('layouts.user.main')

@section('title')
    <h3>Edit Profile</h3>
@endsection

@section('content')
    <div class="profile-section" style="
        width: 100%;
        height: 100%;
        background: green;
        margin-top: 15%; 
        margin-bottom: 15%">
        <div class="profile-square" style="background: #F0F0F0; padding: 5%">
            <form action="/profile/update" method="POST">
                @csrf
                <div class="row profile-detail py-2">
                    <div class="col-3">
                        <h4>EMAIL</h4>
                    </div>
                    <div class="col-9">
                        <input type="text" id="profile-email" style="width: -webkit-fill-available" required>
                    </div>
                </div>
                <div class="row profile-detail py-2">
                    <div class="col-3">
                        <h4>USERNAME</h4>
                    </div>
                    <div class="col-9">
                        <input type="text" id="profile-username" style="width: -webkit-fill-available" required>
                    </div>
                </div>
                <div class="row profile-detail py-2">
                    <div class="col-3">
                        <h4>ADDRESS</h4>
                    </div>
                    <div class="col-9">
                        <input type="text" id="profile-address" style="width: -webkit-fill-available" required>
                    </div>
                </div>
                <div class="row profile-detail py-2">
                    <div class="col-3">
                        <h4>ROLES</h4>
                    </div>
                    <div class="col-9">
                        <input type="text" id="profile-roles" style="width: -webkit-fill-available" readonly>
                    </div>
                </div>
                <div class="row profile-detail py-2">
                    <div class="col-3">
                        <h4>TAG</h4>
                    </div>
                    <div class="col-9">
                        <input type="text" id="profile-tag" style="width: -webkit-fill-available" readonly>
                    </div>
                </div>
                <div class="col" style="text-align-last: end;">
                    <button class="btn btn-success" type="submit">SAVE</button>
                </div>
            </form>
        </div>
    </div>
@endsection