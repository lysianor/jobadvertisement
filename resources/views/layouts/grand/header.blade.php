<body>
<div class="wrapper">
	<div class="preloader"></div>
	<!-- Main Header Nav -->
	<header class="header-nav style_one navbar-scrolltofixed main-menu">
		<div class="container">
		    <!-- Ace Responsive Menu -->
		    <nav>
		        <!-- Menu Toggle btn-->
		        <div class="menu-toggle">
		            <img class="nav_logo_img img-fluid" src="https://www.gainstrong.com.ph/wp-content/uploads/2019/09/cropped-GS-Logo-150x50.png" alt="header-logo.png">
		            <button type="button" id="menu-btn">
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>
		        </div>
		        <a href="/" class="navbar_brand float-left dn-smd">
		            <img class="img-fluid" src="https://www.gainstrong.com.ph/wp-content/uploads/2019/09/cropped-GS-Logo-150x50.png" alt="header-logo.png">
		        </a>
		        <!-- Responsive Menu Structure-->
		        <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
		        <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
			        <li class="{{ Request::is('/') ? 'active' : '' }}" ><a href="/"><span class="title">Home</span></a></li>
	                <li class="{{ Request::is('job-search') ? 'active' : '' }}"><a href="{{ url('job-search') }}"><span class="title">Browse Job</span></a></li>
	                <li class="{{ Request::is('company-search') ? 'active' : '' }}"><a href="{{ url('company-search') }}"><span class="title">Explore Companies</span></a></li>
	                <li><a href="#">About</a></li>
	                <li><a href="#">Contact Us</a></li>
	                <li><a href="#">Faq</a></li>
		        </ul>
		        <ul class="header_user_notif pull-right dn-smd">
		        	@if(Request::is('admin*'))
	                <li class="user_notif">
						<div class="dropdown">
						    <a href="page-candidates-job-alert.html" data-toggle="dropdown"><span class="flaticon-alarm color-white fz20"></span><span>99</span></a>
						    <div class="dropdown-menu">
								<div class="so_heading">
									<p>Notifications</p>
								</div>
								<div class="so_content" data-simplebar="init">
									<ul>
										<li>
											<h5>Candidate suggestion</h5>
											<p>You might be interested based on your profile.</p>
										</li>
										<li>
											<h5>Candidate suggestion</h5>
											<p>You might be interested based on your profile.</p>
										</li>
										<li>
											<h5>Candidate suggestion</h5>
											<p>You might be interested based on your profile.</p>
										</li>
										<li>
											<h5>Candidate suggestion</h5>
											<p>You might be interested based on your profile.</p>
										</li>
										<li>
											<h5>Candidate suggestion</h5>
											<p>You might be interested based on your profile.</p>
										</li>
										<li>
											<h5>Candidate suggestion</h5>
											<p>You might be interested based on your profile.</p>
										</li>
										<li>
											<h5>Candidate suggestion</h5>
											<p>You might be interested based on your profile.</p>
										</li>
									</ul>
								</div>
						    </div>
						</div>
	                </li>
	                @endif
	                @if(Request::is('employer*'))
	                <li class="user_notif">
						<div class="dropdown">
						    <a href="page-candidates-job-alert.html" data-toggle="dropdown"><span class="flaticon-alarm color-white fz20"></span><span>50</span></a>
						    <div class="dropdown-menu">
								<div class="so_heading">
									<p>Notifications</p>
								</div>
								<div class="so_content" data-simplebar="init">
									<ul>
										<li>
											<h5>Candidate suggestion</h5>
											<p>You might be interested based on your profile.</p>
										</li>
										<li>
											<h5>Candidate suggestion</h5>
											<p>You might be interested based on your profile.</p>
										</li>
										<li>
											<h5>Candidate suggestion</h5>
											<p>You might be interested based on your profile.</p>
										</li>
										<li>
											<h5>Candidate suggestion</h5>
											<p>You might be interested based on your profile.</p>
										</li>
										<li>
											<h5>Candidate suggestion</h5>
											<p>You might be interested based on your profile.</p>
										</li>
										<li>
											<h5>Candidate suggestion</h5>
											<p>You might be interested based on your profile.</p>
										</li>
										<li>
											<h5>Candidate suggestion</h5>
											<p>You might be interested based on your profile.</p>
										</li>
									</ul>
								</div>
						    </div>
						</div>
	                </li>
	                @endif
	                <li class="user_setting">
						<div class="dropdown">
	                		<a class="btn dropdown-toggle" href="#" data-toggle="dropdown"><img class="rounded-circle" src="/profile/{{ Auth::user()->image }}"> <span class="pl15 pr15">{{ Auth::user()->name }}</span></a>
						    <div class="dropdown-menu">
						    	<div class="user_set_header">
							    	<p>Hi, {{ Auth::user()->name }} <br><span class="address">{{ ucwords(Auth::user()->company )}}</span></p>
						    	</div>
						    	<div class="user_setting_content">
									@if(Request::is('admin*'))
									<a class="dropdown-item active" href="{{route('admin.dashboard')}}"><span class="flaticon-dashboard"></span> Dashboard</a>
									{{-- <a class="dropdown-item" href="{{route('admin.profile')}}"><span class="flaticon-profile"></span> Company Profile</a> --}}
									<a class="dropdown-item" href="{{ route('admin.post.pending') }}"><span class="flaticon-resume"></span> Pending Job</a>
									<a class="dropdown-item" href="{{route('admin.post.index')}}"><span class="flaticon-paper-plane"></span> Manage Jobs</a>
									<a class="dropdown-item" href="{{ route('admin.employer.index') }}"><span class="flaticon-paper-plane"></span> Employer</a>
									<a class="dropdown-item" href="{{ route('admin.category.index') }}"><span class="flaticon-paper-plane"></span> Manage Categories</a>
									<a class="dropdown-item" href="{{ route('admin.tag.index') }}"><span class="flaticon-paper-plane"></span> Manage Tag</a>
									<a class="dropdown-item" href="{{ route('admin.employment.index') }}"><span class="flaticon-paper-plane"></span> Manage Employment</a>
									<a class="dropdown-item" href="{{ route('admin.subscriber.index') }}"><span class="flaticon-paper-plane"></span> Subscribers</a>
									<a class="dropdown-item" href="{{ route('admin.settings') }}"><span class="flaticon-locked"></span> Change Password</a>
									<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="flaticon-logout"></span> Logout</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
									</form>
									@endif
									@if(Request::is('employer*'))
									<a class="dropdown-item active" href="{{route('employer.dashboard')}}"><span class="flaticon-dashboard"></span> Dashboard</a>
									<a class="dropdown-item" href="{{route('employer.profile')}}"><span class="flaticon-profile"></span> Company Profile</a>
									<a class="dropdown-item" href="{{route('employer.post.create')}}"><span class="flaticon-resume"></span> Post a New Job</a>
									<a class="dropdown-item" href="{{route('employer.post.index')}}"><span class="flaticon-paper-plane"></span> Manage Jobs</a>
									<a class="dropdown-item" href="{{ route('employer.settings') }}"><span class="flaticon-locked"></span> Change Password</a>
									<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="flaticon-logout"></span> Logout</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
									</form>
									@endif
						    	</div>
						    </div>
						</div>
			        </li>
	            </ul>
		    </nav>
		    <!-- End of Responsive Menu -->
		</div>
	</header>
	<!-- Main Header Nav For Mobile -->
	<div id="page" class="stylehome1 h0">
		<div class="mobile-menu">
	        <ul class="header_user_notif pull-right">
                <li class="user_notif">
					<div class="dropdown">
					    <a href="page-candidates-job-alert.html" data-toggle="dropdown"><span class="flaticon-alarm color-white fz20"></span><span>8</span></a>
					    <div class="dropdown-menu">
							<div class="so_heading">
								<p>Notifications</p>
							</div>
							<div class="so_content" data-simplebar="init">
								<ul>
									<li>
										<h5>Candidate suggestion</h5>
										<p>You might be interested based on your profile.</p>
									</li>
									<li>
										<h5>Candidate suggestion</h5>
										<p>You might be interested based on your profile.</p>
									</li>
									<li>
										<h5>Candidate suggestion</h5>
										<p>You might be interested based on your profile.</p>
									</li>
									<li>
										<h5>Candidate suggestion</h5>
										<p>You might be interested based on your profile.</p>
									</li>
									<li>
										<h5>Candidate suggestion</h5>
										<p>You might be interested based on your profile.</p>
									</li>
									<li>
										<h5>Candidate suggestion</h5>
										<p>You might be interested based on your profile.</p>
									</li>
									<li>
										<h5>Candidate suggestion</h5>
										<p>You might be interested based on your profile.</p>
									</li>
								</ul>
							</div>
					    </div>
					</div>
                </li>
                <li class="user_setting">
					<div class="dropdown">
                		<a class="btn dropdown-toggle" href="#" data-toggle="dropdown"><img class="rounded-circle" src="/profile/{{ Auth::user()->image }}" title="{{ Auth::user()->name }}"></a>
					    <div class="dropdown-menu">
					    	<div class="user_set_header">
						    	<p>Hi, {{ Auth::user()->name }} <br><span class="address">COMPANY NAME</span></p>
					    	</div>
					    	<div class="user_setting_content">
					    		@if(Request::is('admin*'))
								<a class="dropdown-item active" href="{{route('admin.dashboard')}}"><span class="flaticon-dashboard"></span> Dashboard</a>
								{{-- <a class="dropdown-item" href="{{route('admin.profile')}}"><span class="flaticon-profile"></span> Company Profile</a> --}}
								<a class="dropdown-item" href="{{ route('admin.post.pending') }}"><span class="flaticon-resume"></span> Pending Job</a>
								<a class="dropdown-item" href="{{route('admin.post.index')}}"><span class="flaticon-paper-plane"></span> Manage Jobs</a>
								<a class="dropdown-item" href="{{ route('admin.employer.index') }}"><span class="flaticon-paper-plane"></span> Employer</a>
								<a class="dropdown-item" href="{{ route('admin.category.index') }}"><span class="flaticon-paper-plane"></span> Manage Categories</a>
								<a class="dropdown-item" href="{{ route('admin.tag.index') }}"><span class="flaticon-paper-plane"></span> Manage Tag</a>
								<a class="dropdown-item" href="{{ route('admin.employment.index') }}"><span class="flaticon-paper-plane"></span> Manage Employment</a>
								<a class="dropdown-item" href="{{ route('admin.subscriber.index') }}"><span class="flaticon-paper-plane"></span> Subscribers</a>
								<a class="dropdown-item" href="{{ route('admin.settings') }}"><span class="flaticon-locked"></span> Change Password</a>
								<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="flaticon-logout"></span> Logout</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
								</form>
								@endif
								@if(Request::is('employer*'))
								<a class="dropdown-item active" href="{{route('employer.dashboard')}}"><span class="flaticon-dashboard"></span> Dashboard</a>
								<a class="dropdown-item" href="{{route('employer.profile')}}"><span class="flaticon-profile"></span> Company Profile</a>
								<a class="dropdown-item" href="{{route('employer.post.create')}}"><span class="flaticon-resume"></span> Post a New Job</a>
								<a class="dropdown-item" href="{{route('employer.post.index')}}"><span class="flaticon-paper-plane"></span> Manage Jobs</a>
								<a class="dropdown-item" href="{{ route('employer.settings') }}"><span class="flaticon-locked"></span> Change Password</a>
								<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="flaticon-logout"></span> Logout</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
								</form>
								@endif
					    	</div>
					    </div>
					</div>
		        </li>
            </ul>
			<div class="header stylehome1 dashbord_mobile_logo">
	            <img class="nav_logo_img img-fluid float-left mt25 " src="https://www.gainstrong.com.ph/wp-content/uploads/2019/09/cropped-GS-Logo-150x50.png" alt="header-logo.png">
				<a class="bg-thm" href="#menu"><span></span></a>
			</div>
		</div>
		<!-- /.mobile-menu -->

		<nav id="menu" class="stylehome1">
			<ul>
				<li class="{{ Request::is('/') ? 'active' : '' }}" ><a href="/"><span class="title">Home</span></a></li>
                <li class="{{ Request::is('job-search') ? 'active' : '' }}"><a href="{{ url('job-search') }}"><span class="title">Browse Job</span></a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Faq</a></li>
			</ul>
		</nav>
	</div>
