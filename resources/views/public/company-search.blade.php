@extends('layouts.home.home')

@section('title','Explore Companies -')

@section('content')
<div class="main-content-wrapper">

  <section>
    <div class="crumina-module crumina-map crumina-map--700" id="map-canvas">
      <div class="block-location-info"></div>
    </div>
  </section>

  <section>
    <div class="tabs tabs--border-primary negative-margin-top-115">
      <div class="tab-content">
        <div class="container">
          <div class="row pb60">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <form action="{{ url('/company-search') }}" method="GET">
                  <div class="row">
                    <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
                      <input placeholder="Keywords" name="search"  type="text">
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12 mb-3 mb-md-0">
                      <button type="submit" class="crumina-button button--dark button--xl">Search</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section class="bg-light-grey pb120">
    <div class="container">
      <div class="row mb40">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
          <h3 class="mb40 mt-0">Search Result:</h3>
          @if(count($employers) > 0)
          @foreach($employers as $key=>$employer)
          <div class="ui-card">
            <div class="ui-card-content">
              <div class="vacancies-title-location">
                <a href="{{ route('employer.company',[$employer->id, str_slug($employer->company)]) }}" class="vacancies-title h6">{{ ucwords($employer->company )}}</a>
                <div class="vacancies-location">
                  <span class="published">{{ $employer->size }}</span>
                </div>
                <span class="link--uppercase-wide fs-12">{{ $employer->industry }}</span>
              </div>
              <a href="{{ route('employer.company',[$employer->id, str_slug($employer->company)]) }}" class="logo-company ">
                <img class="logo" src="/profile/{{$employer->image}}">
              </a>
            </div>
            <div class="ui-card-footer">
              <button type="button" class="crumina-button button--blue-dark button--xxs button--uppercase-wide">{{ $employer->posts_count }} Jobs Open</button>              
            </div>
          </div>
          @endforeach
          @else
            <h4 class="mb40 mt-0">There are no companies matching for your search criteria.</h4>
          @endif

        </div>

        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-4 mt-lg-0">

          <aside aria-label="sidebar" class="sidebar sidebar-right">
            <div class="widget w-featured-vacancies widget-sidebar">
              <h3 class="widget-title">Jobs</h3>

              <div class="crumina-module crumina-module-slider navigation-top-right">
                <div class="swiper-btn-wrap">
                  <div class="swiper-btn-prev">
                    <i class="puzzle-icon fal fa-long-arrow-left"></i>
                  </div>

                  <div class="swiper-btn-next">
                    <i class="puzzle-icon fal fa-long-arrow-right"></i>
                  </div>
                </div>
                <div class="swiper-container" data-show-items="1" data-prev-next="1">
                  <div class="swiper-wrapper">
                    @foreach($randomposts as $randompost)
                    <div class="swiper-slide">
                      <div class="ui-card">
                        <div class="ui-card-content">
                          <div class="vacancies-title-location">
                            <a href="{{ route('post.details',[$randompost->id, $randompost->slug]) }}" class="vacancies-title h6">{{ ucwords($randompost->title) }}</a>
                            <div class="vacancies-location">
                              <time class="published">{{ $randompost->created_at->toFormattedDateString() }}</time>
                            </div>
                            <span class="link--uppercase-wide fs-12">{{ $randompost->address }}</span>
                          </div>
                          <a href="{{ route('post.details',[$randompost->id, $randompost->slug]) }}" class="logo-company w-100">
                            <img src="/profile/{{$randompost->user->image}}">
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

              </div>
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
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
           {{ $employers->appends(request()->input() )->links('vendor.pagination.semantic-ui') }}
        </div>
      </div>
    </div>
  </section>

</div>
@include('layouts.home.footer')
@endsection
@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfLv-IdHZm0Xy3kYlAm3TypjjqeUjra9Q&libraries=places&callback=initialize&language=en&region=GB" async defer></script>
<script defer>
  function initialize() {
    var mapOptions = {
      zoom: 12,
      minZoom: 6,
      maxZoom: 17,
      zoomControl:true,
      zoomControlOptions: {
          style:google.maps.ZoomControlStyle.DEFAULT
      },
      center: new google.maps.LatLng({{ $latitude }}, {{ $longitude }}),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      scrollwheel: false,
      panControl:false,
      mapTypeControl:false,
      scaleControl:false,
      overviewMapControl:false,
      rotateControl:false
      }
    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        var image = new google.maps.MarkerImage("assets/pin.png", null, null, null, new google.maps.Size(40,52));
         var places = @json($mapShops);
        for(place in places)
        {
            place = places[place];
            if(place.latitude && place.longitude)
            {
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(place.latitude, place.longitude),
                    icon:image,
                    map: map,
                    title: place.name
                });
                var infowindow = new google.maps.InfoWindow();
                google.maps.event.addListener(marker, 'click', (function (marker, place) {
                    return function () {
                        infowindow.setContent(generateContent(place))
                        infowindow.open(map, marker);
                    }
                })(marker, place));
            }
        }
  }
  google.maps.event.addDomListener(window, 'load', initialize);

    function generateContent(place)
    {
        // var content = `
        //     <div class="gd-bubble" style="">
        //         <div class="gd-bubble-inside">
        //             <div class="geodir-bubble_desc">
        //             <div class="geodir-bubble_image">
        //                 <div class="geodir-post-slider">
        //                     <div class="geodir-image-container geodir-image-sizes-medium_large ">
        //                         <div id="geodir_images_5de53f2a45254_189" class="geodir-image-wrapper" data-controlnav="1">
        //                             <ul class="geodir-post-image geodir-images clearfix">
        //                                 <li>
        //                                     <div class="geodir-post-title">
        //                                         <h4 class="geodir-entry-title">
        //                                             <a href="#/`+place.id+`" title="View: `+place.company+`">`+place.company+`</a>
        //                                         </h4>
        //                                     </div>
        //                                     <a href=""><img src="`+place.image+`" class="align size-medium_large" width="120" height="120"></a>
        //                                 </li>
        //                             </ul>
        //                         </div>
        //                     </div>
        //                 </div>
        //             </div>
        //             </div>
        //         </div>
        //         <div class="geodir-bubble-meta-side">
        //             <div class="geodir-output-location">
        //             <div class="geodir-output-location geodir-output-location-mapbubble">
        //                 <div class="geodir_post_meta  geodir-field-post_title"><span class="geodir_post_meta_icon geodir-i-text">
        //                     <i class="fa fa-minus" aria-hidden="true"></i>
        //                     <span class="geodir_post_meta_title">Industry: </span></span>`+place.industry+`</div>
        //                 <div class="geodir_post_meta  geodir-field-address" itemscope="" itemtype="http://schema.org/PostalAddress">
        //                     <span class="geodir_post_meta_icon geodir-i-address"><i class="fa fa-map-marker" aria-hidden="true"></i>
        //                     <span class="geodir_post_meta_title">Address: </span></span><span itemprop="streetAddress">`+place.address+`</span>
        //                 </div>
        //             </div>
        //             </div>
        //         </div>
        //     </div>
        //     </div>
        //     </div>`;

            var content = `
              <div class="leaflet-popup-content-wrapper">
                <div class="leaflet-popup-content" style="width: 179px;">
                  <h6><a href="{{ route('employer.company', '') }}/`+place.id+`?`+place.company+`" title="View: `+place.company+`">`+place.company+`</a></h6>
                  <div class="vacancies-location">`+place.industry+`</div> 
                  <div class="vacancies-location">`+place.address+`</div>
                </div>
              </div>
        `;

    return content;

    }
</script>
@endsection