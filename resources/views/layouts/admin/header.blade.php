<body data-background-color="dark">
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="dark2">
				
				<a href="#" class="logo">
					<img src="https://www.gainstrong.com.ph/wp-content/uploads/2019/09/cropped-GS-Logo-150x50.png" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark">
				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						@if(Request::is('admin*'))
						{{-- <li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-envelope"></i>
							</a>
							<ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
								<li>
									<div class="dropdown-title d-flex justify-content-between align-items-center">
										Messages 									
										<a href="#" class="small">Mark all as read</a>
									</div>
								</li>
								<li>
									<div class="message-notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="#">
												<div class="notif-img"> 
													<img src="../assets/img/jm_denis.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Jimmy Denis</span>
													<span class="block">
														How are you ?
													</span>
													<span class="time">5 minutes ago</span> 
												</div>
											</a>
										</div>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all messages<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li> --}}
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								
								@if( Auth::user()->unreadNotifications->count())
								<span class="notification">{{ Auth::user()->unreadNotifications->count() }}</span>
								@endif								
							</a>
							<ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
								<li>
									<div class="dropdown-title">You have {{ Auth::user()->unreadNotifications->count() }} new notification</div>
								</li>
								<li>
									<div class="message-notif-scroll scrollbar-outer">
										<div class="notif-center">
											@foreach(Auth::user()->unreadNotifications as $notification)
											<a href="{{ route('admin.post.show',[$notification->data['post_id'], $notification->data['slug']]) }}" style="background-color:  #e5e5e5" <?php $notification->markAsRead() ?>>
												<div class="notif-img"> 
													<img src="/profile/{{ $notification->data['image'] }}" alt="..." >
												</div>
												<div class="notif-content">
													<span class="block">
														{{-- {{ $notification->data['name'] }} --}} New Pending Post
													</span>
													<span class="time">{{ $notification->created_at->diffForHumans() }}</span> 
												</div>
											</a>
											@endforeach

											@foreach(Auth::user()->readNotifications as $notification)
											<a href="{{ route('admin.post.show',[$notification->data['post_id'], $notification->data['slug']]) }}" <?php $notification->markAsRead() ?> >
												<div class="notif-img"> 
													<img src="/profile/{{ $notification->data['image'] }}" alt="..." >
												</div>
												<div class="notif-content">
													<span class="block">
														{{-- {{ $notification->data['name'] }} --}} New Pending Post
													</span>
													<span class="time">{{ $notification->created_at->diffForHumans() }}</span> 
												</div>
											</a>
											@endforeach
										</div>
									</div>
								</li>
								{{-- <li>
									<a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
								</li> --}}
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="/profile/{{ Auth::user()->image }}" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="/profile/{{ Auth::user()->image }}" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4>{{ ucwords(Auth::user()->name) }}</h4>
												<p class="text-muted">{{ ucwords(Auth::user()->email) }}</p>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="{{ route('admin.profile') }}">My Profile</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="{{ route('admin.settings') }}">Account Setting</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							            @csrf
							            </form>
									</li>
								</div>
							</ul>
						</li>
						@endif
						@if(Request::is('employer*'))
						{{-- <li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-envelope"></i>
							</a>
							<ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
								<li>
									<div class="dropdown-title d-flex justify-content-between align-items-center">
										Messages 									
										<a href="#" class="small">Mark all as read</a>
									</div>
								</li>
								<li>
									<div class="message-notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="#">
												<div class="notif-img"> 
													<img src="../../assets/img/jm_denis.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Jimmy Denis</span>
													<span class="block">
														How are you ?
													</span>
													<span class="time">5 minutes ago</span> 
												</div>
											</a>
										</div>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all messages<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li> --}}
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								@if( Auth::user()->unreadNotifications->count())
								<span class="notification">{{ Auth::user()->unreadNotifications->count() }}</span>
								@endif	
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="dropdown-title">You have {{ Auth::user()->unreadNotifications->count() }} new notification</div>
								</li>
								<li>
									<div class="message-notif-scroll scrollbar-outer">
										<div class="notif-center">
											@foreach(Auth::user()->unreadNotifications as $notification)
											<a href="{{ route('employer.post.show',[$notification->data['post_id'], $notification->data['slug']]) }}" style="background-color:  #e5e5e5">
												<div class="notif-icon notif-primary"> <i class="fa fa-check"></i> </div>
												<div class="notif-content">
													<span class="block">
														Your Post Successfully Approved
													</span>
													<span class="time">{{ $notification->created_at->diffForHumans() }}</span> 
												</div>
											</a>
											@endforeach

											@foreach(Auth::user()->readNotifications as $notification)
											<a href="{{ route('employer.post.show',[$notification->data['post_id'], $notification->data['slug']]) }}">
												<div class="notif-icon notif-primary"> <i class="fa fa-check"></i> </div>
												<div class="notif-content">
													<span class="block">
														Your Post Successfully Approved
													</span>
													<span class="time">{{ $notification->created_at->diffForHumans() }}</span> 
												</div>
											</a>
											@endforeach
										</div>
									</div>
								</li>
								{{-- <li>
									<a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
								</li> --}}
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="/profile/{{ Auth::user()->image }}" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="/profile/{{ Auth::user()->image }}" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4>{{ ucwords(Auth::user()->name) }}</h4>
												<p class="text-muted">{{ ucwords(Auth::user()->email) }}</p>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="{{ route('employer.profile') }}">My Profile</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="{{ route('employer.settings') }}">Account Setting</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							            @csrf
							            </form>
									</li>
								</div>
							</ul>
						</li>
						@endif
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>
<style>
	.unread{
		background-color: #e5e5e5;
	}
</style>
