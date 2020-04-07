@extends('layouts.adminLayout.admin_design')

@section('title','Edit Tag')

@push('css')

@endpush

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> 
        <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
        <a href="#">Tags</a> 
        <a href="#" class="current">Edit Tag</a> 
    </div>
    <h1>Tags</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                <h5>Edit Tag</h5>
            </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="POST" action="{{ route('admin.tag.update',$tag->id) }}">
                @csrf
                @method('PUT')
                <div class="control-group">
                    <label class="control-label">Name</label>
                    <div class="controls">
                        <input type="text" id="name" class="form-control" name="name" value="{{ $tag->name }}">
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                    <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.tag.index') }}">BACK</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection