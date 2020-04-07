@extends('layouts.admin.home')

@section('title','Register')

@section('content')
<body class="login">
    <div class="wrapper wrapper-login wrapper-login-full p-0">
        <div class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center bg-secondary-gradient">
            <h1 class="title fw-bold text-white mb-3">Gainstrong Manpower Inc.</h1>
            {{-- <p class="subtitle text-white op-7">Ayo bergabung dengan komunitas kami untuk masa depan yang lebih baik</p> --}}
        </div>
        <div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
           <div class="container container-login">
                <h3 class="text-center">Sign Up</h3>
                <div class="login-form">
                    <form method="POST" action="{{ route('register') }}" id="register">
                    @csrf
                    <div class="form-group">
                        <label for="company" class="placeholder"><b>Company Name</b></label>
                        <input id="company" value="{{ old('company') }}" type="text" maxlength="30" class="form-control" name="company">
                    </div>
                    <div class="form-group">
                        <label for="industry" class="placeholder"><b>Industry</b></label>
                        <select id="industry" name="industry" value="{{ old('industry') }}" class="form-control">
                            <option value='Advertising'>Advertising</option>
                            <option value='Agriculture'>Agriculture</option>
                            <option value='Airlines'>Airlines</option>
                            <option value='Automotive'>Automotive</option>
                            <option value='Business Analysis / General Management'>Business Analysis / General Management</option>
                            <option value='Banking / Financial Services'>Banking / Financial Services</option>
                            <option value='Beauty / Wellness'>Beauty / Wellness</option>
                            <option value="Biomedical">Biomedical</option>
                            <option value='BPO / Customer Service'>BPO / Customer Service</option>
                            <option value='Care Services'>Care Services</option>
                            <option value='Cleaning Services'>Cleaning Services</option>
                            <option value='Construction'>Construction</option>
                            <option value='Creative / Digital Agency'>Creative / Digital Agency</option>
                            <option value='Education / Training'>Education / Training</option>
                            <option value='Engineering - Electrical'>Engineering - Electrical</option>
                            <option value='Engineering - Electronic'>Engineering - Electronic</option>
                            <option value='Engineering - Mechanical'>Engineering - Mechanical</option>
                            <option value='Engineering - Civil, Construction'>Engineering - Building, Civil</option>
                            <option value="Engineering - Others">Engineering - Others</option>
                            <option value='Electronics'>Electronics</option>
                            <option value='Energy'>Energy</option>
                            <option value='Engineering'>Engineering</option>
                            <option value='Entertainment'>Entertainment</option>
                            <option value='Environment Services'>Environment Services</option>
                            <option value='FMCG'>FMCG</option>
                            <option value='Food & Beverage'>Food & Beverage</option>
                            <option value='Government/ Civil Service/ Statutory Boards'>Government/ Civil Service/ Statutory Boards</option>
                            <option value='Healthcare'>Healthcare</option>
                            <option value="Human Resources Management / Consulting">Human Resources Management / Consulting</option>
                            <option value='HR & Recruitment'>HR & Recruitment</option>
                            <option value='Insurance'>Insurance</option>
                            <option value='Interior Design / Graphic Design'>Interior Design / Graphic Design</option>
                            <option value='IT / Telecommunications'>IT / Telecommunications</option>
                            <option value='Legal Services'>Legal Services</option>
                            <option value='Logistics / Shipping'>Logistics / Shipping</option>
                            <option value='Manufacturing'>Manufacturing</option>
                            <option value='Maritime'>Maritime</option>
                            <option value="Medical Services">Medical Services</option>
                            <option value='Others'>Others</option>
                            <option value='Professional Services'>Professional Services</option>
                            <option value="Pharmaceutical">Pharmaceutical</option>
                            <option value='Quantity Survey'>Quantity Survey</option>
                            <option value='Real Estate Agency'>Real Estate Agency</option>
                            <option value='Real Estate Developer'>Real Estate Developer</option>
                            <option value='Real Estate Management'>Real Estate Management</option>
                            <option value='Retail & Ecommerce'>Retail & Ecommerce</option>
                            <option value='Sales'>Sales</option>
                            <option value='Security'>Security</option>
                            <option value='Sports / Fitness / Gyms'>Sports / Fitness / Gyms</option>
                            <option value='Technician Services'>Technician Services</option>
                            <option value='Technology - Hardware'>Technology - Hardware</option>
                            <option value='Technology - Software / Cloud'>Technology - Software / Cloud</option>
                            <option value='Warehousing'>Warehousing</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="size" class="placeholder"><b>Company Size</b></label>
                        <select id="size" name="size" value="{{ old('size') }}" class="form-control">
                            <option value='1-10 employees'>1-10 employees</option>
                            <option value='11-50 employees'>11-50 employees</option>
                            <option value='51-200 employees'>51-200 employees</option>
                            <option value='Over 200 employees'>Over 200 employees</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name" class="placeholder"><b>Name</b></label>
                        <input id="name" type="text" value="{{ old('name') }}" maxlength="30" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email" class="placeholder"><b>Email</b></label>
                        <input id="email" type="email" value="{{ old('email') }}" maxlength="30" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password" class="placeholder"><b>Password</b></label>
                        <div class="position-relative">
                            <input id="password" type="password" minlength="8" maxlength="30" class="form-control" name="password">
                            <div class="show-password">
                                <i class="icon-eye"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="placeholder"><b>Confirm Password</b></label>
                        <div class="position-relative">
                            <input id="password-confirm" type="password" minlength="8" maxlength="30" class="form-control" name="password_confirmation">
                            <div class="show-password">
                                <i class="icon-eye"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="6Lda0eMUAAAAAFsjH1lReVGpsAQeRaAmPl_13JUe"></div>
                        @if ($errors->has('g-recaptcha-response'))
                            <span class="invalid-feedback" style="display:block">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row form-action">
                        <div class="col-md-6">
                            <a href="{{ route('login')}}" class="btn btn-danger btn-link w-100 fw-bold">Cancel</a>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-secondary w-100 fw-bold">Register</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::FormRequest('App\Http\Requests\RegisterRequest', '#register'); !!}
@endsection
