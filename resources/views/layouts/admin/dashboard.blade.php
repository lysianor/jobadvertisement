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
    <title>@yield('title') - {{ config('app.dashboard', 'Gainstrong Manpower Inc.') }}</title>
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
	<link rel="stylesheet" href="{{asset ('assets/admin/css/atlantis.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{asset ('assets/admin/css/demo.css')}}">
	<!-- Favicons -->
    <link rel="shortcut icon" href="{{asset ('/favi.png')}}" type="image/x-icon">
    <link rel="icon" href="{{asset ('/favi.png')}}" type="image/x-icon">
	@yield('styles')
</head>
@include('layouts.admin.header')
@include('layouts.admin.sidebar')
@yield('content')

	<!--   Core JS Files   -->
	<script src="{{asset ('assets/admin/js/core/jquery.3.2.1.min.js')}}"></script>
	<script src="{{asset ('assets/admin/js/core/popper.min.js')}}"></script>
	<script src="{{asset ('assets/admin/js/core/bootstrap.min.js')}}"></script>
	<!-- jQuery UI -->
	<script src="{{asset ('assets/admin/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{asset ('assets/admin/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>
	<!-- jQuery Scrollbar -->
	<script src="{{asset ('assets/admin/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
	<!-- Chart JS -->
	<script src="{{asset ('assets/admin/js/plugin/chart.js/chart.min.js')}}"></script>
	<!-- jQuery Sparkline -->
	<script src="{{asset ('assets/admin/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>
	<!-- Chart Circle -->
	<script src="{{asset ('assets/admin/js/plugin/chart-circle/circles.min.js')}}"></script>
	<!-- Moment JS -->
	<script src="{{asset ('assets/admin/js/plugin/moment/moment.min.js')}}"></script>
	<!-- Bootstrap Toggle -->
	<script src="{{asset ('assets/admin/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script>
	<!-- DateTimePicker -->
	<script src="{{asset ('assets/admin/js/plugin/datepicker/bootstrap-datetimepicker.min.js')}}"></script>
	<!-- Select2 -->
	<script src="{{asset ('assets/admin/js/plugin/select2/select2.full.min.js')}}"></script>
	<!-- Datatables -->
{{-- 	<script src="{{asset ('assets/admin/js/plugin/datatables/datatables.min.js')}}"></script> --}}
	<!-- Bootstrap Notify -->
{{-- 	<script src="{{asset ('assets/admin/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script> --}}
	<!-- jQuery Vector Maps -->
	<script src="{{asset ('assets/admin/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
	<script src="{{asset ('assets/admin/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script>
	<!-- Sweet Alert -->
{{-- 	<script src="{{asset ('assets/admin/js/plugin/sweetalert/sweetalert.min.js')}}"></script> --}}
	<!-- Atlantis JS -->
	<script src="{{asset ('assets/admin/js/atlantis.min.js')}}"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="{{asset ('assets/admin/js/setting-demo.js')}}"></script>
{{-- 	<script src="{{asset ('assets/admin/js/demo.js')}}"></script> --}}
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
	<script>
		$('#lineChart').sparkline([102,109,120,99,110,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: 'rgba(255, 255, 255, .5)',
			fillColor: 'rgba(255, 255, 255, .15)'
		});

		$('#lineChart2').sparkline([99,125,122,105,110,124,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: 'rgba(255, 255, 255, .5)',
			fillColor: 'rgba(255, 255, 255, .15)'
		});

		$('#lineChart3').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: 'rgba(255, 255, 255, .5)',
			fillColor: 'rgba(255, 255, 255, .15)'
		});
	</script>
    @yield('scripts')
</body>
</html>