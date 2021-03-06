@extends('layouts.home.home')

@section('title', ucwords($post->title))

@section('content')
<div class="main-content-wrapper">
  {{-- <section class="stunning-header bg-dark-themes pt200 pb120"> --}}
  <section class="stunning-header stunning-bg1 medium-padding120 bg-light-grey">
    <div class="container">
      <div class="row align-items-end">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 mb-5 mb-md-0">
          <ul class="breadcrumbs">
            <li class="breadcrumbs-item">
              <a href="/">Home<i class="puzzle-icon fal fa-angle-double-right"></i></a>
            </li>
            <li class="breadcrumbs-item">
              <a href="{{ url('/job-search') }}">Browse Jobs</a>
            </li>
            <li class="breadcrumbs-item active">
              @foreach($post->categories as $category)
              <span> {{ $category->name }}</span>
              @endforeach
            </li>
          </ul>

          <h1 class="page-title text-white">{{ ucwords($post->title) }}</h1>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <h6 class="text-white mb-3">Share Job Posting:</h6>
          <ul class="socials socials--round socials--colored">
            <div class="addthis_inline_share_toolbox"></div>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-light-grey medium-padding120">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
          <div class="ui-card ui-card--column mb-0">
            <div class="ui-card-content">
              <h3 class="mb-3">Job Description</h3>
              {!! $post->body !!}
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-4 mt-lg-0">

          <aside aria-label="sidebar" class="sidebar sidebar-right">
            <div class="widget w-about widget-sidebar">
              <div class="about-content">
                <h3 class="widget-title">{{ ucwords($post->user->company) }}</h3>
                <p>{!! str_limit($post->user->about, 80 ?? null ?: 'N/A') !!}</p>
                <a href="{{ route('employer.company',[$post->user->id, $post->user->company]) }}" class="logo">
                  <img class="logo" src="/profile/{{$post->user->image}}">
                </a>
              </div>
              <div class="about-footer">
                <a href="{{ route('employer.company',[$post->user->id, $post->user->company]) }}" class="link--bold link--with-icon link--icon-right">View Company Profile<i class="puzzle-icon far fa-angle-right"></i></a>
              </div>
            </div>

            <div class="widget w-summary widget-sidebar">
              <h3 class="widget-title">Job Summary</h3>
              <ul class="summary-items">
                <li class="summary-item">
                  <span class="summary-type">Type:</span>
                  @foreach($post->employments as $employment)
                    <span class="summary-value"><button class="crumina-button button--red button--xxs button--uppercase-wide">{{ $employment->name }}</button></span>
                  @endforeach
                </li>
                <li class="summary-item">
                  <span class="summary-type">Location:</span>
                  <span class="summary-value">{{ $post->address }}</span>
                </li>
                <li class="summary-item">
                  <span class="summary-type">Salary:</span>
                  <span class="summary-value">&#8369; {{ ucwords($post->salary) }} / {{ ucwords($post->per) }}</span>
                </li>
                
                <li class="summary-item">
                  <span class="summary-type">Viewed:</span>
                  <span class="summary-value">{{ $post->view_count }}</span>
                </li>
                <li class="summary-item">
                  <span class="summary-type">Posted:</span>
                  <span class="summary-value">{{ Carbon\Carbon::parse($post->created_at)->toFormattedDateString() }}</span>
                </li>
              </ul>
            </div>

            <div class="widget w-envato-jobs widget-sidebar">
              <h3 class="widget-title">Job Location</h3>
              <div id="map-canvas" style="height: 225px; width: 100%; position: relative; overflow: hidden;"></div>
            </div>

            <div class="widget w-subscribe widget-sidebar">
              <h3 class="widget-title">Want more jobs like this?</h3>
              <form method="POST" action="{{ route('subscriber.store') }}">
              @csrf
                <input class="input--white" name="email" placeholder="Your Email Address" type="email">
                <button type="submit" class="crumina-button button--dark button--xl w-100">Subscribe Now!</button>
              </form>
            </div>

          </aside>

        </div>
      </div>
    </div>
  </section>

  <section class="medium-padding120">
    <div class="container">
      <div class="row mb60">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <header class="crumina-module crumina-heading heading--h2 heading--with-decoration heading--inline mb-0">
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PC9SZND');</script>
<!-- End Google Tag Manager -->
            <h2 class="heading-title">Jobs you might be interested in</h2>
          </header>
        </div>
      </div>

      <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="crumina-module crumina-module-slider pagination-bottom-center slider--item-with-shadow">

            <div class="swiper-container auto-height" data-show-items="3" data-prev-next="2" data-space-between="40">
              <div class="swiper-wrapper">
                @foreach($randomposts as $randompost)
                <div class="swiper-slide">
                  <div class="ui-card h-100">
                    <div class="ui-card-content">
                      <div class="vacancies-title-location">
                        <a href="{{ route('post.details',[$randompost->id,$randompost->slug]) }}" class="vacancies-title h6">{{ ucwords($randompost->title) }}</a>
                        <div class="vacancies-location">
                          <time class="published">{{ $randompost->created_at->toFormattedDateString() }}</time>
                        </div>
                        <span class="link--uppercase-wide fs-12">{{ $randompost->address }}</span>
                      </div>
                      <a href="{{ route('post.details',[$randompost->id,$randompost->slug]) }}" class="logo-company w-100">
                        <img class="logo" src="/profile/{{$randompost->user->image}}" title="company">
                      </a>
                    </div>
                    <div class="ui-card-footer">
                      @foreach($randompost->categories as $category)
                        <a href="{{ route('category.posts',$category->slug) }}" class="link--uppercase-wide fs-12">{{ $category->name }}</a>
                      @endforeach
                      @foreach($randompost->employments as $employment)
                        <button type="button" class="crumina-button button--blue-dark button--xxs button--uppercase-wide">{{ $employment->name }}</button>
                      @endforeach
                    </div>
                  </div>
                </div>
                @endforeach
 
              </div>
            </div>

            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>
          </div>
        </div>

      </div>
    </div>
  </section>

</div>
@include('layouts.home.footer')
@endsection
@section('scripts')
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e81d3bb04522ca2"></script> 
@if($post->latitude && $post->longitude)
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfLv-IdHZm0Xy3kYlAm3TypjjqeUjra9Q&libraries=places&callback=initialize&language=en&region=GB" async defer></script>
    <script defer>
        function initialize() {
            var latLng = new google.maps.LatLng({{ $post->latitude }}, {{ $post->longitude }});
            var mapOptions = {
                zoom: 14,
                minZoom: 6,
                maxZoom: 17,
                zoomControl:true,
                zoomControlOptions: {
                    style:google.maps.ZoomControlStyle.DEFAULT
                },
                center: latLng,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: false,
                panControl:false,
                mapTypeControl:false,
                scaleControl:false,
                overviewMapControl:false,
                rotateControl:false
            }
            var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
            var image = new google.maps.MarkerImage("{{ asset('assets/pin.png') }}", null, null, null, new google.maps.Size(40,52));

            var content = `
            <div class="gd-bubble" style="">
                <div class="gd-bubble-inside">
                    <div class="geodir-bubble_desc">
                    <div class="geodir-bubble_image">
                        <div class="geodir-post-slider">
                            <div class="geodir-image-container geodir-image-sizes-medium_large ">
                                <div id="geodir_images_5de53f2a45254_189" class="geodir-image-wrapper" data-controlnav="1">
                                    <ul class="geodir-post-image geodir-images clearfix">
                                      
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="geodir-bubble-meta-side">
                    <div class="geodir-output-location">
                    <div class="geodir-output-location geodir-output-location-mapbubble">
                        <div class="geodir_post_meta  geodir-field-post_title"><span class="geodir_post_meta_icon geodir-i-text">
                    
                        <div class="geodir_post_meta  geodir-field-address" itemscope="" itemtype="http://schema.org/PostalAddress">
                            <span class="geodir_post_meta_icon geodir-i-address">
                            <span class="geodir_post_meta_title">Address: </span></span><span itemprop="streetAddress">{{ $post->address }}</span>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            </div>
            </div>`;
            var marker = new google.maps.Marker({
                position: latLng,
                icon:image,
                map: map,
                title: '{{ $post->name }}'
            });
            var infowindow = new google.maps.InfoWindow();
            google.maps.event.addListener(marker, 'click', (function (marker) {
                return function () {
                    infowindow.setContent(content)
                    infowindow.open(map, marker);
                }
            })(marker));
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@endif
@endsection