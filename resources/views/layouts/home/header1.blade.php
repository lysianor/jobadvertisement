<body class="crumina-grid">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PC9SZND"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- Header -->
<header class="header header--sticky header--dark" id="site-header">
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PC9SZND');</script>
<!-- End Google Tag Manager -->
	<div class="container">
		<div class="header-content-wrapper">
			<a href="/" class="site-logo">
				<img class="puzzle-icon" src="{{asset ('img/gsm.png')}}" alt="logo" width="120">
			</a>
			<nav id="primary-menu" class="primary-menu">
				<!-- menu-icon-wrapper -->
				<a href='javascript:void(0)' id="menu-icon-trigger" class="menu-icon-trigger showhide">
					<span class="mob-menu--title">Menu</span>
					<span id="menu-icon-wrapper" class="menu-icon-wrapper">
						<svg width="1000px" height="1000px">
							<path id="pathD" d="M 300 400 L 700 400 C 900 400 900 750 600 850 A 400 400 0 0 1 200 200 L 800 800"></path>
							<path id="pathE" d="M 300 500 L 700 500"></path>
							<path id="pathF" d="M 700 600 L 300 600 C 100 600 100 200 400 150 A 400 380 0 1 1 200 800 L 800 200"></path>
						</svg>
					</span>
				</a>
				<ul class="primary-menu-menu">
					<li>
						<a href="/">Home</a>
					</li>
					<li>
						<a href="{{ url('/job-search') }}">Browse Job</a>
					</li>
					<li>
						<a href="{{ url('/company-search') }}">Explore Companies</a>
					</li>
				</ul>
			</nav>
			<nav class="login-menu">
				<ul>
					<li>
						<a href="{{ route('register')}}">Sign Up</a>
					</li>
					<li>
						<a href="{{ route('login') }}" class="crumina-button button--primary button--s button--hover-primary">Login</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header>

<!-- End Header -->
