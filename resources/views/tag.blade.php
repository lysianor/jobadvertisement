@extends('layouts.grand.home')

@section('title','Browse Tag')

@push('css')

@endpush
@section('content')
<!-- Our Candidate List -->
  <section class="our-faq bgc-fa mt50">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="row mb20">
            <div class="col-md-6 col-lg-6">
              <div class="candidate_job_alart_btn pjlv3">
                <h4 class="fz20 mb15">We found <strong>{{$posts->total()}}</strong> matches, you're watching <i>{{ $posts->firstItem() }}</i> to <i>{{ $posts->lastItem() }}</i></h4>
                <button class="btn btn-thm btns">Show Filter</button>
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="candidate_revew_select pjlv3 job_list text-right mt50">
                <ul>
                  <li class="list-inline-item">Sort by:</li>
                  <li class="list-inline-item">
                    <select class="selectpicker show-tick">
                      <option>Newest</option>
                      <option>Recent</option>
                      <option>Old Review</option>
                    </select>
                  </li>
                </ul>
              </div>
              <div class="content_details">
                <div class="details">
                  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><span>Hide Filter</span><i>×</i></a>
                  <div class="faq_search_widget mb30">
                    <h4 class="fz20 mb15">Search Keywords</h4>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Find Your Question" aria-label="Recipient's username" aria-describedby="button-addon2">
                      <div class="input-group-append">
                          <button class="btn btn-outline-secondary" type="button" id="button-addon2"><span class="flaticon-search"></span></button>
                      </div>
                    </div>
                  </div>
                  <div class="faq_search_widget mb30">
                    <h4 class="fz20 mb15">Location</h4>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Find Your Question" aria-label="Recipient's username" aria-describedby="button-addon2">
                      <div class="input-group-append">
                          <button class="btn btn-outline-secondary" type="button" id="button-addon2"><span class="flaticon-location-pin"></span></button>
                      </div>
                    </div>
                  </div>
                  <div class="faq_search_widget mb30">
                    <h4 class="fz20 mb15">Category</h4>
                    <div class="candidate_revew_select">
                      <select class="selectpicker w100 show-tick">
                        <option>All Categories</option>
                        <option>Recent</option>
                        <option>Old Review</option>
                      </select>
                    </div>
                  </div>
                  <div class="cl_latest_activity mb30">
                    <h4 class="fz20 mb15">Date Posted</h4>
                    <div class="ui_kit_radiobox">
                      <div class="radio">
                        <input id="radio_one" name="radio" type="radio" checked="">
                        <label for="radio_one"><span class="radio-label"></span> Last Hour</label>
                      </div>
                      <div class="radio">
                        <input id="radio_two" name="radio" type="radio">
                        <label for="radio_two"><span class="radio-label"></span> Last 24 hours</label>
                      </div>
                      <div class="radio">
                        <input id="radio_three" name="radio" type="radio">
                        <label for="radio_three"><span class="radio-label"></span> Last 7 days</label>
                      </div>
                      <div class="radio">
                        <input id="radio_four" name="radio" type="radio">
                        <label for="radio_four"><span class="radio-label"></span> Last 14 days</label>
                      </div>
                      <div class="radio">
                        <input id="radio_five" name="radio" type="radio">
                        <label for="radio_five"><span class="radio-label"></span> Last 30 days</label>
                      </div>
                      <a class="text-thm2 pl30" href="#">View All <span class="flaticon-right-arrow pl10"></span></a>
                    </div>
                  <div class="cl_latest_activity mb30">
                  </div>
                    <h4 class="fz20 mb15">Job Type</h4>
                    <div class="ui_kit_whitchbox">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                        <label class="custom-control-label" for="customSwitch1">Freelance</label>
                      </div>
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch2">
                        <label class="custom-control-label" for="customSwitch2">Full Time</label>
                      </div>
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch3">
                        <label class="custom-control-label" for="customSwitch3">Part Time</label>
                      </div>
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch4">
                        <label class="custom-control-label" for="customSwitch4">Internship</label>
                      </div>
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch5">
                        <label class="custom-control-label" for="customSwitch5">Temporary</label>
                      </div>
                    </div>
                  </div>
                  <div class="cl_pricing_slider mb30">
                    <h4 class="fz20 mb20">Hourly Rate</h4>
                    <div id="slider-range"></div>
                    <p class="text-center">
                      <input class="sl_input" type="text" id="amount">
                    </p>
                  </div>
                  <div class="cl_skill_checkbox mb30">
                    <h4 class="fz20 mb20">Skills</h4>
                    <div class="content ui_kit_checkbox text-left">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">HTML 5</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                        <label class="custom-control-label" for="customCheck2">Javascript</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                        <label class="custom-control-label" for="customCheck3">PHP</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck4">
                        <label class="custom-control-label" for="customCheck4">jQuery</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck5">
                        <label class="custom-control-label" for="customCheck5">UX/UI Design</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck6">
                        <label class="custom-control-label" for="customCheck6">Design</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck7">
                        <label class="custom-control-label" for="customCheck7">Web Design</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck8">
                        <label class="custom-control-label" for="customCheck8">Graphic Design</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck9">
                        <label class="custom-control-label" for="customCheck9">Sketch App</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck10">
                        <label class="custom-control-label" for="customCheck10">UI Design</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck11">
                        <label class="custom-control-label" for="customCheck11">Graphic Design</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck12">
                        <label class="custom-control-label" for="customCheck12">Sketch App</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck13">
                        <label class="custom-control-label" for="customCheck13">UI Design</label>
                      </div>
                    </div>
                  </div>
                  <div class="cl_carrer_lever mb30">
                    <div id="accordion" class="accordion">
                        <div class="link mb10">Career Level<i class="fa fa-caret-up"></i></div>
                        <div class="cl_submenu">
                        <div class="ui_kit_checkbox">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck14">
                            <label class="custom-control-label" for="customCheck14">Intermediate</label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck15">
                            <label class="custom-control-label" for="customCheck15">Normal</label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck16">
                            <label class="custom-control-label" for="customCheck16">Special</label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck17">
                            <label class="custom-control-label" for="customCheck17">Experienced</label>
                          </div>
                        </div>
                        </div>
                    </div>
                  </div>
                  <div class="cl_carrer_lever mb30">
                    <div id="accordion" class="accordion">
                        <div class="link mb10">Experince<i class="fa fa-caret-up"></i></div>
                        <div class="cl_submenu">
                        <div class="ui_kit_checkbox">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck18">
                            <label class="custom-control-label" for="customCheck18">1Year to 2Year</label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck19">
                            <label class="custom-control-label" for="customCheck19">2Year to 3Year</label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck20">
                            <label class="custom-control-label" for="customCheck20">3Year to 4Year</label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck21">
                            <label class="custom-control-label" for="customCheck21">4Year to 5Year</label>
                          </div>
                        </div>
                        </div>
                    </div>
                  </div>
                  <div class="cl_carrer_lever mb30">
                    <div id="accordion" class="accordion">
                        <div class="link mb10">Gender<i class="fa fa-caret-up"></i></div>
                        <div class="cl_submenu">
                        <div class="ui_kit_checkbox">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck22">
                            <label class="custom-control-label" for="customCheck22">Male</label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck23">
                            <label class="custom-control-label" for="customCheck23">Female</label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck24">
                            <label class="custom-control-label" for="customCheck24">Others</label>
                          </div>
                        </div>
                        </div>
                    </div>
                  </div>
                  <div class="cl_carrer_lever mb30">
                    <div id="accordion" class="accordion">
                        <div class="link mb10">Industry<i class="fa fa-caret-up"></i></div>
                        <div class="cl_submenu">
                        <div class="ui_kit_checkbox">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck25">
                            <label class="custom-control-label" for="customCheck25">Development</label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck26">
                            <label class="custom-control-label" for="customCheck26">Management</label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck27">
                            <label class="custom-control-label" for="customCheck27">Finance</label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck28">
                            <label class="custom-control-label" for="customCheck28">HTML Department</label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck29">
                            <label class="custom-control-label" for="customCheck29">Seo</label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck30">
                            <label class="custom-control-label" for="customCheck30">Banking</label>
                          </div>
                        </div>
                        </div>
                    </div>
                  </div>
                  <div class="cl_carrer_lever">
                    <div id="accordion" class="accordion">
                        <div class="link mb10">Qualification<i class="fa fa-caret-up"></i></div>
                        <div class="cl_submenu">
                        <div class="ui_kit_checkbox">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck31">
                            <label class="custom-control-label" for="customCheck31">Certificate</label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck32">
                            <label class="custom-control-label" for="customCheck32">Diploma</label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck33">
                            <label class="custom-control-label" for="customCheck33">Associate</label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck34">
                            <label class="custom-control-label" for="customCheck34">Degree Bachelor</label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck35">
                            <label class="custom-control-label" for="customCheck35">Associate</label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck36">
                            <label class="custom-control-label" for="customCheck36">Master's Degree</label>
                          </div>
                        </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            @if(count($posts) > 0)
            @foreach($posts as $post)
            <div class="col-sm-6 col-lg-12">
              <div class="fj_post home3 bbt">
                <div class="details">
                  <div class="thumb fn-smd">
                    <img class="img-fluid" src="/storage/profile/{{$post->user->image}}" alt="{{ $post->title }}">
                  </div>
                  <h4>{{ ucwords($post->title )}}</h4>
                  <p>@foreach($post->employments as $employment)
                  <a class="job_chedule text-thm2" href="{{ route('employment.posts',$employment->slug) }}">{{ ucwords($employment->name) }}</a>
                  @endforeach</p>
                  <p><a class="text-thm3" href="{{ route('employer.company',[$post->user->id, str_slug($post->user->company)]) }}">{{ ucwords($post->user->company) }}</a></p>
                  <ul class="featurej_post">
                    <li class="list-inline-item"><span class="flaticon-event"></span> Posted On: {{ Carbon\Carbon::parse($post->created_at)->toFormattedDateString()}}</li>
                    <li class="list-inline-item"><span class="flaticon-price pl20"></span> <a href="#">$13.00 - $18.00 per hour</a></li>
                    <li class="list-inline-item"><span class="flaticon-location-pin"></span> <a href="#">Bothell, WA, USA</a></li>
                  </ul>
                </div>
                <a class="btn btn-md btn-transparent2 float-right fn-smd" href="{{ route('post.details',[$post->id, $post->slug]) }}">Browse Job</a>
              </div>
            </div>
            {{-- <div class="col-md-6 col-lg-6 col-xl-4">
              <div class="feature_job_post">
                <div class="details">
                  <div class="thumb">
                    <img class="img-fluid" src="/storage/profile/{{$post->user->image}}" alt="{{ $post->title }}">
                  </div>
                  @foreach($post->employments as $employment)
                  <h5><a class="job_chedule text-thm2" href="{{ route('employment.posts',$employment->slug) }}">{{ $employment->name }}</a></h5>
                  @endforeach
                  <h4>{{ ucwords($post->title) }}</h4>
                  <h4><a href="#" class="text-thm4">{{ ucwords($post->user->company) }}</a></h4>
                  <p>Posted on {{ Carbon\Carbon::parse($post->created_at)->toFormattedDateString()}}</p>
                </div>
                <ul class="fj_post_meta">
                  <li class="list-inline-item float-left"><span class="flaticon-location-pin"></span> <a href="#">Bothell, WA, USA</a></li>
                  <li class="list-inline-item float-right"><a class="btn" href="{{ route('post.details',[$post->id, $post->slug]) }}">Browse Job</a></li>
                </ul>
              </div>
            </div> --}}

            @endforeach
            @else
            <div class="col-sm-6 col-lg-12">
                <h1>There are no tags matching for your search criteria.</h1>
                <h4>Please searched with other options.</h4>
            </div>
            @endif

            <div class="col-lg-12">
              <!-- Page navigation -->
              <div class="mbp_pagination text-center">
                  {{ $posts->appends(request()->input() )->links('vendor.pagination.default') }}
              </div>
              <!-- END Page navigation -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Our Footer Top Area -->
  <section class="footer_top_area p0">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-lg-2 pb25 pt25">
          <div class="logo-widget">
            <img class="img-fluid" src="images/header-logo.png" alt="header-logo.png">
          </div>
        </div>
        <div class="col-sm-12 col-lg-6 pb25 pt25 pl60 pr40 brdr_left_right">
          <div class="row">
            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
              <div class="funfact_one">
                <div class="timer">2,395</div>
                <p>Jobs Added</p>
              </div>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
              <div class="funfact_one">
                <div class="timer">1,267</div>
                <p>Jobs Posted</p>
              </div>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
              <div class="funfact_one">
                <div class="timer">1,095</div>
                <p>Companies</p>
              </div>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
              <div class="funfact_one">
                <div class="timer">7,348</div>
                <p>Freelancer</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-lg-4 pb25 pt25 pl30">
          <div class="footer_social_widget mt15">
            <p class="float-left mt10">Follow Us</p>
            <ul>
              <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
@push('js')

@endpush
