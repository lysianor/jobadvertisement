@extends('layouts.admin.dashboard')

@section('title','Edit Category')

@section('content')
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <h4 class="page-title">Edit Category</h4>
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <form method="post" action="{{ route('admin.category.update',$category->id) }}" id="update-category" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card card-with-nav">
                      <div class="card-header">
                          <div class="row row-nav-line">
                              <ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-3" role="tablist">
                                  <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Edit Category</a></li>
                              </ul>
                          </div>
                      </div>
                      <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" placeholder="Eg. Accountant">
                                </div>
                            </div>
                        </div>
                        <div class="text-right mt-3 mb-3">
                          <button class="btn btn-success" type="submit">Save</button>
                          <a class="btn btn-danger" href="{{ route('admin.category.index')}}">Cancel</a>
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
{!! JsValidator::FormRequest('App\Http\Requests\StoreCategoryRequest', '#update-category'); !!}
@endsection