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
    <title>@yield('title') - {{ config('app.home', 'Gainstrong Manpower Inc.') }}</title>
	<!-- Fonts and icons -->
	<script src="{{asset ('assets/admin/js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{asset ('assets/admin/css/fonts.min.css')}}']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset ('assets/admin/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset ('assets/admin/css/home.min.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<!-- Favicons -->
    <link rel="shortcut icon" href="{{asset ('/favi.png')}}" type="image/x-icon">
    <link rel="icon" href="{{asset ('/favi.png')}}" type="image/x-icon">
	@yield('styles')
</head>
@yield('content')
	<!--   Core JS Files   -->
	<script src="{{asset ('assets/admin/js/core/jquery.3.2.1.min.js')}}"></script>
	<script src="{{asset ('assets/admin/js/core/popper.min.js')}}"></script>
	<script src="{{asset ('assets/admin/js/core/bootstrap.min.js')}}"></script>
	<!-- Atlantis JS -->
	<script src="{{asset ('assets/admin/js/atlantis.min.js')}}"></script>
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