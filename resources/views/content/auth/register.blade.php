@extends('layouts.auth.main')

@section('content')
    <div class="h-100 d-flex flex-row align-items-center justify-content-center">
        <div class="form-square rounded-4" style="background:darkorange; min-height: 40vh; min-width: 60vh; border: solid;">
            <div class="form-section py-3">
                <h3 class="mb-3" style="text-align-last: center"><strong>REGISTER</strong></h3>
                <div class="form-input d-flex" style="justify-content: center">
                    <form class="px-3" action="/login" method="POST" style="width: -webkit-fill-available">
                    @csrf
                        <div class="mx-0 mb-2 row">
                            <div class="col-6 col-md-3">
                                <label for="inputEmail" class="col col-form-label">Email</label>
                            </div>
                            <div class="col-sm-6 col-md-9" style="align-self: center">
                                <input type="email" class="form-control" id="inputEmail">
                            </div>
                        </div>
                        <div class="mx-0 mb-2 row">
                            <div class="col-6 col-md-3">
                                <label for="inputUsername" class="col col-form-label">Username</label>
                            </div>
                            <div class="col-sm-6 col-md-9" style="align-self: center">
                                <input type="text" class="form-control" id="inputUsername">
                            </div>
                        </div>
                        <div class="mx-0 mb-2 row">
                            <div class="col-6 col-md-3">
                                <label for="inputPassword" class="col col-form-label">Password</label>
                            </div>
                            <div class="col-sm-6 col-md-9" style="align-self: center">
                                <input type="password" class="form-control" id="inputPassword">
                            </div>
                        </div>
                        <div class="mx-0 mb-2 row">
                            <div class="col-6 col-md-3">
                                <label for="inputConfirmPassword" class="col col-form-label">Confirm Password</label>
                            </div>
                            <div class="col-sm-6 col-md-9" style="align-self: center">
                                <input type="password" class="form-control" id="inputConfirmPassword">
                            </div>
                        </div>
                        <div class="mx-0 mb-2 row">
                            <div class="col-6 col-md-3">
                                <label for="inputRegisterAs" class="col col-form-label">Register As</label>
                            </div>
                            <div class="col-sm-6 col-md-9" style="align-self: center">
                                <div class="input-group">
                                    <select class="form-select" id="inputGroupSelect01">
                                        <option selected>Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mx-0 my-4 row" style="align-items: center">
                            <div class="col-sm-6 col-md-9">
                                <a href="/login">Already have an account?</a>
                            </div>
                            <div class="col-6 col-md-3" style="text-align-last: end;">
                                <button class="btn btn-success" type="submit">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection