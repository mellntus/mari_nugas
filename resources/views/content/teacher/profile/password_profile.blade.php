@extends('layouts.user.teacher.main')

@section('title')
    <h3>Change Password</h3>
@endsection

@section('content')
    <div class="profile-section" style="
        width: 100%;
        height: 100%;
        background: green;
        margin-top: 15%; 
        margin-bottom: 15%">
        <div class="profile-square" style="background: #F0F0F0; padding: 5%">
            <form action="{{ url('/profile/update-password') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row profile-detail py-2">
                    <div class="col-3">
                        <h6>OLD PASSWORD</h6>
                    </div>
                    <div class="col-9">
                        <input type="password" name="profile_old_password" id="profile_old_password" style="width: -webkit-fill-available" required>
                    </div>
                </div>
                <div class="row profile-detail py-2">
                    <div class="col-3">
                        <h6>NEW PASSWORD</h6>
                    </div>
                    <div class="col-9">
                        <input type="password" name="profile_new_password" id="profile_new_password" style="width: -webkit-fill-available" required>
                    </div>
                </div>
                <div class="row profile-detail py-2">
                    <div class="col-3">
                        <h6>CONFIRM PASSWORD</h6>
                    </div>
                    <div class="col-9">
                        <input type="password" name="profile_confirm_password" id="profile_confirm_password" style="width: -webkit-fill-available" required>
                    </div>
                </div>
                <div class="col" style="text-align-last: end;">
                    <button class="btn btn-success" type="submit">SAVE</button>
                </div>
            </form>
        </div>
    </div>
@endsection