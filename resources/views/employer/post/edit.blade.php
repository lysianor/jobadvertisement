@extends('layouts.admin.dashboard')

@section('title','Edit Job')

@section('content')
 <div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <h4 class="page-title">Edit Your Job</h4>
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <form action="{{ route('employer.post.update',$post->id) }}" id="update-post" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card card-with-nav">
                        <div class="card-header">
                            <div class="row row-nav-line">
                                <ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-3" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Edit Your Job</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Title</label>
                                        <input type="text" id="title" name="title" class="form-control" placeholder="Eg. UX/UI Desginer" value="{{ ucwords($post->title) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3 mb-1">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Job Description</label>
                                       <textarea class="form-control" name="body" id="body" rows="9" value="{{ old('body') }}">{{ $post->body }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group form-floating-label">
                                        <label>Job Category</label>
                                        <select class="form-control input-border-bottom" name="categories[]" id="category" value="{{ old('category') }}">
                                            @foreach($categories as $category)
                                            <option
                                            @foreach($post->categories as $postCategory)
                                                {{ $postCategory->id == $category->id ? 'selected' : '' }}
                                            @endforeach
                                                  value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-floating-label">
                                        <label>Employment</label>
                                        <select class="form-control input-border-bottom" name="employments[]" id="employment" value="{{ old('employment') }}">
                                            @foreach($employments as $employment)
                                            <option @foreach($post->employments as $postEmployment)
                                                {{ $postEmployment->id == $employment->id ? 'selected' :'' }}
                                            @endforeach
                                                value="{{ $employment->id }}">{{ $employment->name }}</option>
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
                                            @foreach(['Associate Degree','Bachelor Degree','Doctoral Degree', 'Master Degree'] as $degree)
                                            <option value="{{$degree}}"
                                                @if($post->degree == old('degree', $degree)) selected @endif >{{$degree}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-floating-label">
                                        <label>Salary</label>
                                        <input type="text" id="salary" name="salary" class="form-control" placeholder="PHP" value="{{ $post->salary }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-floating-label">
                                        <label>Per</label>
                                        <select class="form-control input-border-bottom" name="per" id="per" value="{{ old('per') }}">
                                            @foreach(['Hour', 'Day', 'Week', 'Month', 'Shift'] as $per)
                                            <option value="{{$per}}"
                                                @if($post->per == old('per', $per)) selected @endif >{{$per}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Address</label>
                                        <input class="form-control map-input {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $post->address) }}">
                                        <input type="hidden" name="latitude" id="address-latitude" value="{{ old('latitude', $post->latitude) ?? '0' }}" />
                                        <input type="hidden" name="longitude" id="address-longitude" value="{{ old('longitude', $post->longitude) ?? '0' }}" />
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
{!! JsValidator::FormRequest('App\Http\Requests\UpdatePostRequest', '#update-post'); !!}
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
            language: 'spanish',
            // height: 150,
            // width: 563
                    // uiColor: '#884EA1'
        });
</script>
@endsection
