@extends('layouts.auth.main')

@section('content')
    <div class="h-100 d-flex flex-row align-items-center justify-content-center">
        <div class="form-square rounded-4" style="background:darkorange; min-height: 40vh; min-width: 60vh; border: solid;">
            <div class="form-section py-3">
                <h3 class="mb-3" style="text-align-last: center"><strong>LOGIN</strong></h3>
                <div class="form-input d-flex" style="justify-content: center">
                    <form class="px-3" action="/login" method="POST" style="width: -webkit-fill-available">
                        @csrf
                        <div class="mx-0 mb-2 row">
                            <div class="col-6 col-md-3">
                                <label for="inputEmail" class="col col-form-label">Email</label>
                            </div>
                            <div class="col-sm-6 col-md-9">
                                <input type="email" class="form-control" id="inputEmail" name="inputEmail">
                            </div>
                        </div>
                        <div class="mx-0 mb-2 row">
                            <div class="col-6 col-md-3">
                                <label for="inputPassword" class="col col-form-label">Password</label>
                            </div>
                            <div class="col-sm-6 col-md-9">
                                <input type="password" class="form-control" id="inputPassword" name="inputPassword">
                            </div>
                        </div>
                        <div class="mx-0 my-4 row" style="align-items: center">
                            <div class="col">
                                <a href="/register">Don't have an account?</a>
                            </div>
                            <div class="col" style="text-align-last: end;">
                                <button class="btn btn-success" type="submit">LOGIN</button>
                            </div>
                        </div>
                    </form>

                </div>
            @if (session()->has('success'))
                <div class="alert alert-success  fade show" role="alert" style="display: flex; justify-content: space-between">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('loginError'))
                <div class="alert alert-danger fade show" role="alert" style="display: flex; justify-content: space-between">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            </div>
        </div>
    </div>
@endsection