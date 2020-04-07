@extends('layouts.admin.home')
@section('title', __('Error 404'))
@section('content')

<body class="page-not-found">
	<div class="wrapper not-found">
		<h1 class="animated fadeIn">404</h1>
		<div class="desc animated fadeIn"><span>OOPS!</span><br/>Looks like you get lost</div>
		<a href="{{ url()->previous() }}" class="btn btn-primary btn-back-home mt-4 animated fadeInUp">
			<span class="btn-label mr-2">
				<i class="flaticon-home"></i>
			</span>
			Back To Home
		</a>
	</div>
@endsection
