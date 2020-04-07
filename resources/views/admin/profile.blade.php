@extends('layouts.admin.dashboard')

@section('title','Company Profile')

@section('content')
<div class="main-panel">
        <div class="container">
            <div class="page-inner">
                <h4 class="page-title">Company Profile</h4>
                <div class="row">
                    <div class="col-md-8">
                        <form method="POST" action="{{ route('admin.profile.update') }}"  id="company" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="card card-with-nav">
                            <div class="card-header">
                                <div class="row row-nav-line">
                                    <ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-3" role="tablist">
                                        <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Company Profile</a> </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <div class="input-file input-file-image">
                                            <img class="img-upload-preview" width="150" src="http://placehold.it/150x50" alt="preview">
                                            <input type="file" class="form-control form-control-file" id="uploadImg2" name="image" accept="image/*">
                                            <label for="uploadImg2" class="label-input-file btn btn-black btn-round">
                                                <span class="btn-label">
                                                    <i class="fa fa-file-image"></i>
                                                </span>
                                                Upload a Image
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Name</label>
                                            <input type="text" value="{{ ucwords($users->name) }}" name="name" class="form-control" id="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Company Name</label>
                                            <input type="text" value="{{ ucwords($users->company) }}" name="company" class="form-control" id="company">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" value="{{ $users->phone }}" min="11" name="phone" id="phone" aria-describedby="phoneNumber" placeholder="+63 587 658 96 32">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Website</label>
                                            <input type="text" class="form-control" value="{{ $users->website }}" name="website" id="website" placeholder="www.yourcompany.com">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group form-floating-label">
                                            <select class="form-control input-border-bottom" id="size" name="size" value="{{ old('size') }}">
                                                @foreach(['1-10 employees', '11-50 employees', '51-200 employees', 'Over 200 employees'] as $size)
                                                <option value="{{$size}}"
                                                    @if($users->size == old('size', $size)) selected @endif >{{$size}}</option>
                                                @endforeach
                                            </select>
                                            <label for="selectFloatingLabel" class="placeholder">INDUSTRY</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-floating-label">
                                            <select class="form-control input-border-bottom" id="industry" name="industry" value="{{ old('industry') }}" >
                                                @foreach([
                                                'Advertising', 'Agriculture', 'Airlines', 'Automotive',
                                                'Banking / Financial Services', 'Business Analysis / General Management', 'Beauty / Wellness', 'Biomedical','BPO / Customer Service', 'Care Services',
                                                'Cleaning Services', 'Construction', 'Creative / Digital Agency', 'Education / Training',
                                                'Engineering - Electrical', 'Engineering - Electronic', 'Engineering - Mechanical', 'Engineering - Building, Civil', 'Engineering - Others', 'Energy', 'Engineering', 'Entertainment',
                                                'Environment Services', 'FMCG', 'Food & Beverage', 'Government/ Civil Service/ Statutory Boards',
                                                'Healthcare', 'Human Resources Management / Consulting', 'HR & Recruitment', 'Insurance',
                                                'Interior Design / Graphic Design', 'IT / Telecommunications', 'Legal Services', 'Logistics / Shipping', 'Manufacturing',
                                                'Maritime', 'Medical Services', 'Others', 'Pharmaceutical', 'Professional Services', 'Quantity Survey',
                                                'Real Estate Agency', 'Real Estate Developer', 'Real Estate Management', 'Retail & Ecommerce',
                                                'Sales', 'Security', 'Sports / Fitness / Gyms', 'Technician Services',
                                                'Technology - Hardware', 'Technology - Software / Cloud', 'Warehousing',
                                                ] as $industry)
                                                <option value="{{$industry}}"
                                                    @if($users->industry == old('industry', $industry)) selected @endif >{{$industry}}</option>
                                                @endforeach
                                            </select>
                                            <label for="selectFloatingLabel" class="placeholder">COMPANY SIZE</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>Address</label>
                                            <input class="form-control map-input {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $users->address) }}">
                                            <input type="hidden" name="latitude" id="address-latitude" value="{{ old('latitude', $users->latitude) ?? '0' }}" />
                                            <input type="hidden" name="longitude" id="address-longitude" value="{{ old('longitude', $users->longitude) ?? '0' }}" />
                                            @if($errors->has('address'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('address') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div id="address-map-container" class="mb-2" style="width:100%;height:400px; ">
                                            <div style="width: 100%; height: 100%" id="address-map"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>ABOUT COMPANY</label>
                                            <textarea class="form-control" name="about" id="about" rows="9">{{ $users->about }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right mt-3 mb-3">
                                    <button class="btn btn-success" type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-profile">
                            <div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
                                <div class="profile-picture">
                                    <div class="avatar avatar-xl">
                                        <img src="/profile/{{ Auth::user()->image }}" alt="..." class="avatar-img rounded-circle">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="user-profile text-center">
                                    <div class="name">{{ ucwords($users->name) ?? null ?: 'N/A' }}</div>
                                    <div class="job">{{ ucwords($users->company) ?? null ?: 'N/A' }}</div>
                                    <div class="desc">{!! ucwords($users->about) ?? null ?: 'N/A' !!}</div>
                                    <div class="social-media">
                                        <a class="btn btn-info btn-twitter btn-sm btn-link" href="#"> 
                                            <span class="btn-label just-icon"><i class="flaticon-twitter"></i> </span>
                                        </a>
                                        <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#"> 
                                            <span class="btn-label just-icon"><i class="flaticon-google-plus"></i> </span> 
                                        </a>
                                        <a class="btn btn-primary btn-sm btn-link" rel="publisher" href="#"> 
                                            <span class="btn-label just-icon"><i class="flaticon-facebook"></i> </span> 
                                        </a>
                                        <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#"> 
                                            <span class="btn-label just-icon"><i class="flaticon-dribbble"></i> </span> 
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row user-stats text-center">
                                    <div class="col">
                                        <div class="number">{{ $posts->count() }}</div>
                                        <div class="title">Post</div>
                                    </div>
                                    <div class="col">
                                        <div class="number">{{ $all_views }}</div>
                                        <div class="title">Views</div>
                                    </div>
                                </div>
                            </div>
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
{!! JsValidator::FormRequest('App\Http\Requests\UpdateCompanyInfoRequest', '#company'); !!}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfLv-IdHZm0Xy3kYlAm3TypjjqeUjra9Q&libraries=places&callback=initialize&language=en&region=GB" async defer></script>
<script type="text/javascript" src="{{asset ('assets/admin/js/mapInput.js')}}"></script>
<script>
    $('#datetime').datetimepicker({
        format: 'MM/DD/YYYY H:mm',
    });
    $('#datepicker').datetimepicker({
        format: 'MM/DD/YYYY',
    });
    $('#timepicker').datetimepicker({
        format: 'h:mm A', 
    });

    $('#basic').select2({
        theme: "bootstrap"
    });

    $('#multiple').select2({
        theme: "bootstrap"
    });

    $('#multiple-states').select2({
        theme: "bootstrap"
    });

    $('#tagsinput').tagsinput({
        tagClass: 'badge-info'
    });

    $( function() {
        $( "#slider" ).slider({
            range: "min",
            max: 100,
            value: 40,
        });
        $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 500,
            values: [ 75, 300 ]
        });
    } );
</script>
<script src="//cdn.ckeditor.com/4.14.0/basic/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('about', {
            toolbar:
                    [
                        {name: 'basicstyles', items: ['Bold', 'Italic', 'Underline']},
                        {name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-']},
                        {name: 'links', items: ['Link', 'Unlink']},
                        {name: 'tools', items: ['']}
                    ],
            language: '',
            // height: 150,
            // width: 563
                    // uiColor: '#884EA1'
        });
</script>
@endsection