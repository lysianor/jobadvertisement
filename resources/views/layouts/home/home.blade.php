<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="Gainstrong Manpower Inc - Recruitment Portal Development" />
        <meta property="og:description" content="" />
        <meta property="og:url" content="https://gainstrongm.xyz" />
        <meta property="og:site_name" content="https://gainstrongm.xyz" />
        <meta property="fb:app_id" content="966242223397117" />
        <meta property="og:image" content="https://ii.bj-stc.com/ph/logos/empresas/2017/06/02/c336d0da1d114c0fb6dd013710thumbnail.jpeg" />
        <meta name="title" content=" Gainstrong Manpower Inc. " />
        <meta name="description" content="Find or post best jobs industry for part time or full time at Gainstrong Manpower Inc " />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') {{ config('app.home', 'Gainstrong Manpower Inc.') }}</title>
	<link rel="stylesheet" type="text/css" href="{{asset ('css/vendors/Bootstrap/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset ('css/font-awesome.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset ('css/main.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

	<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">
	<!-- Favicons -->
    <link rel="shortcut icon" href="{{asset ('/favi.png')}}" type="image/x-icon">
    <link rel="icon" href="{{asset ('/favi.png')}}" type="image/x-icon">
	@yield('styles')
</head>
@include('layouts.home.header1')
@yield('content')

	<!-- jQuery first, then Other JS. -->

<script src="{{asset ('js/jquery.js')}}"></script>

<script src="{{asset ('js/Bootstrap/bootstrap.bundle.js')}}"></script>

<script src="{{asset ('js/js-plugins/crum-mega-menu.js')}}"></script>


<script src="{{asset ('js/js-plugins/froala_editor.min.js')}}"></script>
<script src="{{asset ('js/js-plugins/imagesLoaded.js')}}"></script>
<script src="{{asset ('js/js-plugins/isotope.pkgd.min.js')}}"></script>
<script src="{{asset ('js/js-plugins/jquery.magnific-popup.js')}}"></script>
<script src="{{asset ('js/js-plugins/jquery.matchHeight.js')}}"></script>
<script src="{{asset ('js/js-plugins/leaflet.js')}}"></script>
<script src="{{asset ('js/js-plugins/MarkerClusterGroup.js')}}"></script>
<script src="{{asset ('js/js-plugins/select2.js')}}"></script>
<script src="{{asset ('js/js-plugins/smooth-scroll.js')}}"></script>
<script src="{{asset ('js/js-plugins/swiper.min.js')}}"></script>
<script src="{{asset ('js/js-plugins/TimeCircles.js')}}"></script>
<script src="{{asset ('js/js-plugins/ajax-pagination.js')}}"></script>
<script src="{{asset ('js/js-plugins/segment.js')}}"></script>
<script src="{{asset ('js/js-plugins/sticky-sidebar.js')}}"></script>

<script src="{{asset ('js/main.js')}}"></script>
<!-- FontAwesome 5.x.x JS -->
<script defer src="fonts/fontawesome-all.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{!! Toastr::message() !!}
<script>
@if($errors->any())
@foreach($errors->all() as $error)
toastr.error('{{ $error }}','Error',{
    closeButton:true,
    progressBar:true,
});
@endforeach
@endif
</script>
    @yield('scripts')
</body>
</html>