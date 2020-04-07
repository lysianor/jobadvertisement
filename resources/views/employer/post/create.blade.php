@extends('layouts.admin.dashboard')

@section('title','Post a New Job')

@section('content')
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <h4 class="page-title">Post A New Job</h4>
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <form action="{{ route('employer.post.store') }}" method="POST" id="store-post" enctype="multipart/form-data">
                    @csrf
                    <div class="card card-with-nav">
                        <div class="card-header">
                            <div class="row row-nav-line">
                                <ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-3" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Post a new Job</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Title</label>
                                        <input type="text" id="title" name="title" class="form-control" placeholder="Eg. UX/UI Desginer" value="{{ old('title') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Job Description</label>
                                       <textarea class="form-control" name="body" id="body" rows="9" value="{{ old('body') }}"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group form-floating-label">
                                        <label>Job Category</label>
                                        <select class="form-control input-border-bottom" name="categories[]" id="category" value="{{ old('category') }}">
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ (collect(old('categories'))->contains($category->id)) ? 'selected':'' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-floating-label">
                                        <label>Employment</label>
                                        <select class="form-control input-border-bottom" name="employments[]" id="employment" value="{{ old('employment') }}">
                                             @foreach($employments as $employment)
                                            <option value="{{ $employment->id }}" {{ (collect(old('employments'))->contains($employment->id)) ? 'selected':'' }}>{{ $employment->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div class="form-group form-floating-label">
                                        <label>Degree</label>
                                         <select class="form-control input-border-bottom" name="degree" id="degree" value="{{ old('degree') }}">
                                            <option value="Associate Degree">Associate Degree </option>
                                            <option value="Bachelor Degree">Bachelor Degree</option>
                                            <option value="Doctoral Degree">Doctoral Degree</option>
                                            <option value="Master Degree">Master Degree </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-floating-label">
                                        <label>Salary</label>
                                        <input type="text" id="salary" name="salary" class="form-control" placeholder="PHP" value="{{ old('salary') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-floating-label">
                                        <label>Per</label>
                                        <select class="form-control input-border-bottom" name="per" id="per" value="{{ old('per') }}">
                                            <option value="Hour">Per Hour</option>
                                            <option value="Day">Per Day</option>
                                            <option value="Week">Per Week</option>
                                            <option value="Month">Per Month</option>
                                            <option value="Shift">Per Shift</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Address</label>
                                        <input class="form-control map-input {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address') }}">
                                        <input type="hidden" name="latitude" id="address-latitude" value="{{ old('latitude') ?? '0' }}" />
                                        <input type="hidden" name="longitude" id="address-longitude" value="{{ old('longitude') ?? '0' }}" />
                                        @if($errors->has('address'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('address') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div id="address-map-container" class="mb-2" style="width:100%;height:400px; ">
                                        <div style="width: 100%; height: 100%" id="address-map"></div>
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
            </div>
        </div>
    </div>
    @include('layouts.admin.footer')
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::FormRequest('App\Http\Requests\StorePostRequest', '#store-post'); !!}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfLv-IdHZm0Xy3kYlAm3TypjjqeUjra9Q&libraries=places&callback=initialize&language=en&region=GB" async defer></script>
<script type="text/javascript" src="{{asset ('assets/grand/js/mapInput.js')}}"></script>
<script src="//cdn.ckeditor.com/4.14.0/basic/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('body', {
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
