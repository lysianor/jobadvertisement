@extends('layouts.admin.dashboard')

@section('title','Setting')

@section('content')
    <div class="main-panel">
        <div class="container">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Change Password</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="#">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Change Password</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Change Password</div>
                            </div>
                            <form method="POST" action="{{ route('employer.password.update') }}" id="change-password">
                            @csrf
                            @method('PUT')
                                <div class="card-body">
                                    <div class="form-group form-show-validation row">
                                        <label for="old_password" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Old Password <span class="required-label">*</span></label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter your old password">
                                        </div>
                                    </div>

                                    <div class="form-group form-show-validation row">
                                        <label for="password" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">New Password <span class="required-label">*</span></label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your new password">
                                        </div>
                                    </div>
                                    <div class="form-group form-show-validation row">
                                        <label for="confirm_password" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Confirm Password <span class="required-label">*</span></label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <input type="password" class="form-control" id="confirm_password" name="password_confirmation" placeholder="Enter your new password again">
                                        </div>
                                    </div>                
                                </div>
                                <div class="card-action">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="btn btn-success" type="submit" value="Save">
                                        </div>                                      
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.admin.footer')
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::FormRequest('App\Http\Requests\ChangePasswordRequest', '#change-password'); !!}
@endsection