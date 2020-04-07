@extends('layouts.admin.home')

@section('title','Request Reset Password')

@section('content')
<body class="login">
    <div class="wrapper wrapper-login wrapper-login-full p-0">
        <div class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center bg-secondary-gradient">
            <h1 class="title fw-bold text-white mb-3">Gainstrong Manpower Inc.</h1>
            {{-- <p class="subtitle text-white op-7">Ayo bergabung dengan komunitas kami untuk masa depan yang lebih baik</p> --}}
        </div>
        <div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
            <div class="container container-login ">
                <h3 class="text-center">Request Reset Password</h3>
                <div class="login-form">
                    <form method="POST" action="{{ route('password.request') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="form-group">
                        <input id="email" type="hidden" class="form-control" name="email" value="{{ $email ?? old('email') }}"  >
                    </div>
                    <div class="form-group">
                        <label for="password" class="placeholder"><b>Password</b></label>
                        <div class="position-relative">
                            <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            <div class="show-password">
                                <i class="icon-eye"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="placeholder"><b>Confirm Password</b></label>
                        <div class="position-relative">
                            <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation">
                            <div class="show-password">
                                <i class="icon-eye"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row form-action">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-secondary w-100 fw-bold">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection