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
	                <li class="{{ Request::is('job-search') ? 'active' : '' }}"><a href="{{ url('job-search') }}"><span class="title">Browse Jobs</span></a></li>
	                <li class="{{ Request::is('company-search') ? 'active' : '' }}"><a href="{{ url('company-search') }}"><span class="title">Explore Companies</span></a></li>
	                <li><a href="#">About</a></li>
	                <li><a href="#">Contact Us</a></li>
	                <li><a href="#">Faq</a></li>
		        </ul>
		        @guest
		        <ul class="sign_up_btn pull-right dn-smd mt10">
                	<a href="{{ route('login') }}" class="btn btn-md">Login</a>
					<a href="{{ route('register') }}" class="btn btn-md">Register</a>
	         	</ul>
	         	@else
	         	<ul class="sign_up_btn pull-right dn-smd mt10">
                	<a href="{{ route('login') }}" class="btn btn-md">Dashboard</a>
	         	</ul>
	         	@endguest
		    </nav>
		    <!-- End of Responsive Menu -->
		</div>
	</header>
	<!-- Main Header Nav For Mobile -->
	<div id="page" class="stylehome1 h0">
		<div class="mobile-menu">
			<div class="header stylehome1 home4">
							<img class="nav_logo_img img-fluid float-left mt25" src="https://www.gainstrong.com.ph/wp-content/uploads/2019/09/cropped-GS-Logo-150x50.png" alt="header-logo.png">
				<a class="bgc-darkblue" href="#menu"><span></span></a>
			</div>
		</div><!-- /.mobile-menu -->
		<nav id="menu" class="stylehome1">
			<ul>
				<li class="{{ Request::is('/') ? 'active' : '' }}"><a  href="/"><span class="title">Home</span></a></li>
				<li class="{{ Request::is('job-search') ? 'active' : '' }}" ><a href="{{ url('job-search') }}"><span class="title">Browse Job</span></a></li>
				<li><a href="#">About</a></li>
				<li><a href="#">Contact Us</a></li>
				<li><a href="#">Faq</a></li>
				<li><a href="{{ route('login') }}">Login</a></li>
				<li><a href="{{ route('register') }}">Register</a></li>
			</ul>
		</nav>
	</div>
