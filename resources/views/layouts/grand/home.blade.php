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
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset ('assets/grand/css/bootstrap.min.css')}}">   
    <link rel="stylesheet" href="{{asset ('assets/grand/css/style.css')}}">
    <!-- Responsive stylesheet -->
    <link rel="stylesheet" href="{{asset ('assets/grand/css/responsive.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{asset ('/favi.png')}}" type="image/x-icon">
    <link rel="icon" href="{{asset ('/favi.png')}}" type="image/x-icon">
    @yield('styles')
  </head>
@include('layouts.grand.nav')

@yield('content')
@include('layouts.grand.footer')
    <!-- Scripts -->
    <script type="text/javascript" src="{{asset ('assets/grand/js/jquery-3.3.1.js')}}"></script>
    <script type="text/javascript" src="{{asset ('assets/grand/js/jquery-migrate-3.0.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset ('assets/grand/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset ('assets/grand/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset ('assets/grand/js/jquery.mmenu.all.js')}}"></script>
    <script type="text/javascript" src="{{asset ('assets/grand/js/ace-responsive-menu.js')}}"></script>
    <script type="text/javascript" src="{{asset ('assets/grand/js/chart.min.js')}}"></script>
    <script type="text/javascript" src="{{asset ('assets/grand/js/chart.custome.js')}}"></script>
    <script type="text/javascript" src="{{asset ('assets/grand/js/bootstrap-select.min.js')}}"></script>
    <script type="text/javascript" src="{{asset ('assets/grand/js/snackbar.min.js')}}"></script>
    <script type="text/javascript" src="{{asset ('assets/grand/js/simplebar.js')}}"></script>
    <script type="text/javascript" src="{{asset ('assets/grand/js/tagsinput.js')}}"></script>
    <script type="text/javascript" src="{{asset ('assets/grand/js/parallax.js')}}"></script>
    <script type="text/javascript" src="{{asset ('assets/grand/js/scrollto.js')}}"></script>
    <script type="text/javascript" src="{{asset ('assets/grand/js/jquery-scrolltofixed-min.js')}}"></script>
    <script type="text/javascript" src="{{asset ('assets/grand/js/jquery.counterup.js')}}"></script>
    <script type="text/javascript" src="{{asset ('assets/grand/js/wow.min.js')}}"></script>
    <script type="text/javascript" src="{{asset ('assets/grand/js/progressbar.js')}}"></script>
    <script type="text/javascript" src="{{asset ('assets/grand/js/slider.js')}}"></script>
    <script type="text/javascript" src="{{asset ('assets/grand/js/timepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset ('assets/grand/js/wow.min.js')}}"></script>
    <!-- Custom script for all pages -->
    <script type="text/javascript" src="{{asset ('assets/grand/js/script.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
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
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
    });
    </script>
    @yield('scripts')
</body>
</html>
