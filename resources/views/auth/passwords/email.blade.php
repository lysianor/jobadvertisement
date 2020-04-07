@extends('layouts.admin.home')

@section('title','Reset Password')

@section('content')
<body class="login">
    <div class="wrapper wrapper-login wrapper-login-full p-0">
        <div class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center bg-secondary-gradient">
            <h1 class="title fw-bold text-white mb-3">Gainstrong Manpower Inc.</h1>
            {{-- <p class="subtitle text-white op-7">Ayo bergabung dengan komunitas kami untuk masa depan yang lebih baik</p> --}}
        </div>
        <div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
            <div class="container container-login">
                <h3 class="text-center">Reset Your Password</h3>
                <div class="login-form">
                    <form method="POST" action="{{ route('password.email') }}">
                    @csrf 
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="email" class="placeholder"><b>Email</b></label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" autofocus>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif 
                    </div>
                    <div class="form-group form-action-d-flex mb-3">
                        <button type="submit" class="btn btn-secondary col-md-5 float-right mt-3 mt-sm-0 fw-bold">Submit</button>
                    </div>
                    <div class="login-account">
                        <span class="msg">Oops, I just remembered it! Take me back to the</span>
                        <a href="{{ route('login') }}" class="link">Login</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection