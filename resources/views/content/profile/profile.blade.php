@extends('layouts.user.main')

@section('title')
    <h3>Profile</h3>
@endsection

@section('content')
    <div class="profile-section" style="
        width: 100%;
        height: 100%;
        background: green;
        margin-top: 10%; 
        margin-bottom: 15%">
        <div class="profile-square" style="background: #F0F0F0; padding: 5%">
            <div class="profile-edit-section" style="display: flex; justify-content: flex-end">
                <a class="px-4" href="/student/profile/edit">Edit</a>
                <a href="/student/profile/change-password">Change Password</a>
            </div>
            <div class="row profile-detail py-2">
                <div class="col-3">
                    <h4>EMAIL</h4>
                </div>
                <div class="col-9">
                    <h4>: erlangga@gmail.com</h4>
                </div>
            </div>
            <div class="row profile-detail py-2">
                <div class="col-3">
                    <h4>USERNAME</h4>
                </div>
                <div class="col-9">
                    <h4>: ERLANGGA ADIDARMA HARTONO</h4>
                </div>
            </div>
            <div class="row profile-detail py-2">
                <div class="col-3">
                    <h4>ADDRESS</h4>
                </div>
                <div class="col-9">
                    <h4>: JAKARTA BARAT, INDONESIA</h4>
                </div>
            </div>
            <div class="row profile-detail py-2">
                <div class="col-3">
                    <h4>ROLES</h4>
                </div>
                <div class="col-9">
                    <h4>: TEACHER</h4>
                </div>
            </div>
            <div class="row profile-detail py-2">
                <div class="col-3">
                    <h4>TAG</h4>
                </div>
                <div class="col-9">
                    <h4>: EAH#123</h4>
                </div>
            </div>
        </div>
    </div>
@endsection