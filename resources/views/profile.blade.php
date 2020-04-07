@extends('layouts.home.home')

@section('title', ucwords($employer->company))

@section('content')
<div class="main-content-wrapper">

  <section class="stunning-header stunning-bg1 medium-padding120 bg-light-grey">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
          <ul class="breadcrumbs">
            <li class="breadcrumbs-item">
              <a href="/">Home<i class="puzzle-icon fal fa-angle-double-right"></i></a>
            </li>
            <li class="breadcrumbs-item">
              <a href="{{ url('/company-search')}}">Explore Companies</a>
            </li>
            <li class="breadcrumbs-item active">
              <span>{{ ucwords($employer->industry) }}</span>
            </li>
          </ul>

          <h1 class="page-title text-white mb60">{{ ucwords($employer->company) }}</h1>

          <div class="ui-card ui-card--column mb-0">
            <div class="ui-card-content">
              <h3 class="mb-3">About company</h3>
              {!! ($employer->about ?? null ?: 'N/A') !!}
            </div>
            <div class="ui-card-footer">
              <div class="d-flex align-items-center w-100">
                <h5 class="mr-4">Share:</h5>
                <ul class="socials socials--round socials--colored">
                  <div class="addthis_inline_share_toolbox"></div>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 pt120">
          <aside aria-label="sidebar" class="sidebar sidebar-right">

            <div class="widget w-company widget-sidebar">

              <a href="" class="logo-company">
                <img class="logo" src="/profile/{{$employer->image}}">
              </a>

              <ul class="summary-items">
{{--                 <li class="summary-item">
                  <span class="summary-type">Founded:</span>
                  <span class="summary-value"><a href="#">2006</a></span>
                </li> --}}
                <li class="summary-item">
                  <span class="summary-type">Employer:</span>
                  <span class="summary-value">{{ $employer->name }}</span>
                </li>
                <li class="summary-item">
                  <span class="summary-type">Vacancies:</span>
                  <span class="summary-value">{{ $posts->count() }} Jobs Available</span>
                </li>
                <li class="summary-item">
                  <span class="summary-type">Industry:</span>
                  <span class="summary-value">{{ ucwords($employer->industry) }}</span>
                </li>
                <li class="summary-item">
                  <span class="summary-type">Website:</span>
                  <span class="summary-value"><a href="#">{{ ($employer->website ?? null ?: 'N/A') }}</a></span>
                </li>
                <li class="summary-item">
                  <span class="summary-type">Contact no:</span>
                  <span class="summary-value">{{ ($employer->phone ?? null ?: 'N/A') }}</span>
                </li>
                <li class="summary-item">
                  <span class="summary-type">Size:</span>
                  <span class="summary-value">{{ ucwords($employer->size) }}</span>
                </li>
                <li class="summary-item">
                  <span class="summary-type">Views:</span>
                  <span class="summary-value">{{ $all_views }}</span>
                </li>
              </ul>

              <ul class="socials socials--icon-colored">
                <li class="c-facebook">
                  <a href="#">
                    <i class="puzzle-icon fab fa-facebook-f"></i>
                  </a>
                </li>
                <li class="c-twitter">
                  <a href="#">
                    <i class="puzzle-icon fab fa-twitter"></i>
                  </a>
                </li>
                <li class="c-instagram">
                  <a href="#">
                    <i class="puzzle-icon fab fa-instagram"></i>
                  </a>
                </li>
                <li class="c-youtube">
                  <a href="#">
                    <i class="puzzle-icon fab fa-youtube"></i>
                  </a>
                </li>
                <li class="c-pinterest">
                  <a href="#">
                    <i class="puzzle-icon fab fa-pinterest-p"></i>
                  </a>
                </li>
              </ul>
            </div>

            <div class="widget w-location widget-sidebar">
              <div class="h4 widget-title mb-3 mb-lg-5">Location</div>
              <div id="map-canvas" style="height: 225px; width: 100%; position: relative; overflow: hidden;"></div>
            </div>

          </aside>
        </div>
      </div>
    </div>
  </section>

  <section class="pb120 bg-light-grey">
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
            <h2 class="heading-title">Jobs</h2>
          </header>
        </div>
      </div>

      <div class="row sorting-container mb20" id="job-items" data-layout="fitRows">
        @if(count($posts) > 0)
        @foreach($posts as $post)
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb40 sorting-item">
          <div class="ui-card mb-0" data-mh="job-item">
            <div class="ui-card-content">
              <div class="vacancies-title-location">
                <a href="{{ route('post.details',[$post->id, $post->slug]) }}" class="vacancies-title h6">{{ ucwords($post->title) }}</a>
                <div class="vacancies-location">
                  <time class="published">{{ $post->created_at->toFormattedDateString() }}</time>
                </div>
                  <span class="link--uppercase-wide fs-12">{{ $post->address }}</span>
              </div>
            </div>
            <div class="ui-card-footer">
              @foreach($post->categories as $category)
                <a class="link--uppercase-wide fs-12" href="{{ route('category.posts',$category->slug) }}">{{ $category->name }}</a>
              @endforeach
              @foreach($post->employments as $employment)
                <button type="button" class="crumina-button button--blue-dark button--xxs button--uppercase-wide">{{ $employment->name }}</button>
              @endforeach
            </div>
          </div>
        </div>
        @endforeach
        @else
          <div class="col-lg-12">
            <span>No jobs found.</span>
          </div>
        @endif
        
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
           {{ $posts->appends(request()->input() )->links('vendor.pagination.semantic-ui') }}
        </div>
      </div>

 

    </div>
  </section>

</div>
@include('layouts.home.footer')
@endsection
@section('scripts')
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e81d3bb04522ca2"></script> 
@if($employer->latitude && $employer->longitude)
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfLv-IdHZm0Xy3kYlAm3TypjjqeUjra9Q&libraries=places&callback=initialize&language=en&region=GB" async defer></script>
    <script defer>
        function initialize() {
            var latLng = new google.maps.LatLng({{ $employer->latitude }}, {{ $employer->longitude }});
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
                <div class="geodir-bubble-meta-side">
                    <div class="geodir-output-location">
                    <div class="geodir-output-location geodir-output-location-mapbubble">
                        <div class="geodir_post_meta  geodir-field-post_title"><span class="geodir_post_meta_icon geodir-i-text">
                        <div class="geodir_post_meta  geodir-field-address" itemscope="" itemtype="http://schema.org/PostalAddress">
                            <span class="geodir_post_meta_title">Address: </span></span><span itemprop="streetAddress">{{ $employer->address }}</span>
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
                title: '{{ $employer->name }}'
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