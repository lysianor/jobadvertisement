@extends('layouts.grand.dashboard')

@section('title','Create Tag')

@push('css')

@endpush

@section('content')
<!-- Our Dashbord -->
    <section class="cnddte_fvrt our-dashbord dashbord">
        <div class="container">
            <div class="row">
@include('layouts.grand.sidebar')
<div class="col-sm-12 col-lg-8 col-xl-9">
          <div class="my_profile_form_area">
            <div class="row">
              <div class="col-lg-12">
                <h4 class="fz20 mb20">Create a New Tag</h4>
              </div>
              <div class="col-lg-12">
                <form method="post" action="{{ route('admin.tag.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="my_profile_input form-group">
                    <label for="name">Tag</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Eg. Accountant">
                </div>
              </div>
              
              <div class="col-lg-4">
                <div class="my_profile_input">
                  <button type="submit" class="btn btn-lg btn-blue1">Save Changes</button>
                </div>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@push('script')

@endpush