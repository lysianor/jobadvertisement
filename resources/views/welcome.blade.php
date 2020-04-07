@extends('layouts.home.home')

@section('content')
 <div class="main-content-wrapper">

	<div class="crumina-module crumina-module-slider slider--main navigation-center-both-sides bg-dark-themes">
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
				<div class="swiper-slide">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-3 mb-md-0" data-swiper-parallax="-300">
								<h2 class="h1 main-slider-title">Get your dream job</h2>
								<h3 class="main-slider-sub-title">We have
									<span class="c-primary">69.368</span> great job offers you deserve!</h3>
								<div class="universal-btn-wrapper">
									<a href="02_how_it_works.html" class="crumina-button button--yellow button--xl button--hover-primary">How it Works</a>
									<a href="06_company_profile.html" class="arrow--white link--bold link--with-icon link--icon-right">About Us<i class="puzzle-icon far fa-angle-right"></i></a>
								</div>
							</div>

							<div class="col-lg-8 col-md-6 col-sm-12 col-xs-12" data-swiper-parallax="-100">
								<img src="img/svg/01_team.svg" alt="team">
							</div>
						</div>
					</div>
				</div>
				<div class="swiper-slide">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-7 col-md-6 col-sm-12 col-xs-12 mb-3 mb-md-0" data-swiper-parallax="-100">
								<img src="img/svg/03_freelancer.svg" alt="team">
							</div>
							<div class="col-lg-5 col-md-6 col-sm-12 col-xs-12" data-swiper-parallax="-300">
								<h2 class="h1 main-slider-title">Your dream job just a click away</h2>
								<div class="universal-btn-wrapper">
									<a href="11_submit_resume.html" class="crumina-button button--blue button--xl button--hover-primary">Get Started Now</a>
									<a href="10_candidate_details.html" class="arrow--white link--bold link--with-icon link--icon-right">Details<i class="puzzle-icon far fa-angle-right"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="swiper-slide">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 mb-3 mb-md-0" data-swiper-parallax="-300">
								<h2 class="h1 main-slider-title">Find a perfect candidate</h2>
								<h3 class="main-slider-sub-title title--small">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</h3>
								<div class="universal-btn-wrapper">
									<a href="08_candidate_lists_row_map.html" class="crumina-button button--red button--xl button--hover-primary">Candidate List</a>
									<a href="02_how_it_works.html" class="arrow--white link--bold link--with-icon link--icon-right">How it works<i class="puzzle-icon far fa-angle-right"></i></a>
								</div>
							</div>

							<div class="col-lg-7 col-md-6 col-sm-12 col-xs-12" data-swiper-parallax="-100">
								<img src="img/svg/04_employer.svg" alt="team">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<section>
		<div class="tabs tabs--primary negative-margin-top-63">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<ul class="nav nav-tabs" id="myTab2" role="tablist">

							<li role="presentation" class="nav-item active">
								<a class="nav-link active h6 tabs-scroll" id="find-tab" data-toggle="tab" href="#find" role="tab" aria-controls="home" aria-selected="true">Find a Jobs</a>
							</li>

							<li role="presentation" class="nav-item">
								<a class="nav-link h6 tabs-scroll" id="candidate-tab" data-toggle="tab" href="#candidate" role="tab" aria-controls="profile" aria-selected="false">Find a Companies</a>
							</li>

						</ul>
					</div>
				</div>
			</div>

			<div class="tab-content">

				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="tab-pane active" id="find" role="tabpanel" aria-labelledby="find-tab">
								<form action="{{ url('job-search') }}" method="get">

									<div class="row">
										<div class="col-md-4 col-sm-6 col-xs-12 mb-3 mb-md-0">
											<input name="name" placeholder="Keywords" type="text">
										</div>
										<div class="col-md-3 col-sm-6 col-xs-12 mb-3 mb-md-0">
											<select id="employment" name="employment" class="puzzle--select" data-minimum-results-for-search="Infinity">
						                        <option value="0">Select All Employment</option>
						                        @foreach($employments as $id=>$employment)
						                        <option value="{{ $id }}"{{ old('employment', request()->input('employment')) == $id ? ' selected' : '' }}>{{ $employment }}</option>
						                        @endforeach
						                     </select>
										</div>
										<div class="col-md-3 col-sm-6 col-xs-12 mb-3 mb-md-0">
					                      	<select id="category" name="category" class="puzzle--select" data-minimum-results-for-search="Infinity">
												<option value="0">Select All Category</option>
												@foreach($categories as $id=>$category)
												<option type="submit" value="{{ $id }}"{{ old('category', request()->input('category')) == $id ? ' selected' : '' }}>{{ $category }}</option>
												@endforeach
											</select>
										</div>
										<div class="col-md-2 col-sm-6 col-xs-12 mb-3 mb-md-0">
											<button type="submit" class="crumina-button button--dark button--xl">Search</button>
										</div>
									</div>

								</form>
							</div>

							<div class="tab-pane" id="candidate" role="tabpanel" aria-labelledby="candidate-tab">
								<form action="{{ url('/company-search') }}" method="GET">

									<div class="row">
										<div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
											<input placeholder="Keywords" name="search" type="text">
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

	
	<section>
		<div class="tabs tabs--with-icon">
			<div class="tab-content">

				<div class="container">
					<div class="row pb80">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">

								<div class="row sorting-container mb40" id="vacancies-grid" data-layout="fitRows">
									@foreach($posts as $post)
									<div class="col-lg-12 sorting-item">
										<div class="ui-card">
											<div class="ui-card-content">
												<div class="vacancies-title-location">
													<a href="{{ route('post.details',[$post->id, $post->slug]) }}" class="vacancies-title h6">{{ ucwords($post->title )}}</a>
													<div class="vacancies-location">
														<time class="published"> {{ Carbon\Carbon::parse($post->created_at)->toFormattedDateString()}}</time>
													</div>
													<span class="link--uppercase-wide fs-12">{{ $post->address }}</span>
												</div>
												<a href="{{ route('post.details',[$post->id, $post->slug]) }}" class="logo-company">
													<img class="logo" src="/profile/{{$post->user->image}}" alt="{{ $post->title }}">
												</a>
											</div>
											<div class="ui-card-footer">
												@foreach($post->categories as $category)
					  								<a href="{{ route('category.posts',$category->slug) }}" class="link--uppercase-wide fs-12">{{ $category->name }}</a>
								                @endforeach
								                @foreach($post->employments as $employment)
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
				</div>

			</div>
		</div>
	</section>
</div>
@include('layouts.home.footer')
@endsection