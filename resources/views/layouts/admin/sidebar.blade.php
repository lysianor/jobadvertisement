<!-- Sidebar -->
		<div class="sidebar sidebar-style-2" data-background-color="dark2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						@if(Request::is('admin*'))
						<div class="avatar-sm float-left mr-2">
							<img src="/profile/{{ Auth::user()->image }}" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									Administrator
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>
							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li class="{{ Request::is('admin/company-profile') ? 'active' : '' }}">
										<a href="{{route('admin.profile')}}">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li class="{{ Request::is('admin/settings') ? 'active' : '' }}">
										<a href="{{ route('admin.settings') }}">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
						@endif
						@if(Request::is('employer*'))
						<div class="avatar-sm float-left mr-2">
							<img src="/profile/{{ Auth::user()->image }}" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{ ucwords(Auth::user()->name) }}
									<span class="user-level">Employer</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>
							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li class="{{ Request::is('employer/company-profile') ? 'active' : '' }}">
										<a href="{{route('employer.profile')}}">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li class="{{ Request::is('employer/settings') ? 'active' : '' }}">
										<a href="{{ route('employer.settings') }}">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
						@endif
					</div>
					<ul class="nav nav-primary">
						@if(Request::is('admin*'))
						<li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
							<a href="{{route('admin.dashboard')}}">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Components</h4>
						</li>
						<li class="nav-item {{ Request::is('admin/pending/post') ? 'active' : '' }} {{ Request::is('admin/post') ? 'active' : '' }}">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-th-list"></i>
								<p>Jobs</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<li class="{{ Request::is('admin/pending/post') ? 'active' : '' }}">
										<a href="{{ route('admin.post.pending') }}">
											<span class="sub-item">Pending Jobs</span>
										</a>
									</li>
									<li class="{{ Request::is('admin/post') ? 'active' : '' }}">
										<a href="{{route('admin.post.index')}}">
											<span class="sub-item">Active Jobs</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item {{ Request::is('admin/category*') ? 'active' : '' }}">
							<a href="{{ route('admin.category.index') }}">
								<i class="fas fa-table"></i>
								<p>Manage Categories</p>
							</a>
						</li>
						<li class="nav-item {{ Request::is('admin/employment*') ? 'active' : '' }}">
							<a href="{{ route('admin.employment.index') }}">
								<i class="fas fa-table"></i>
								<p>Manage Employment</p>
							</a>
						</li>
						<li class="nav-item {{ Request::is('admin/employers') ? 'active' : '' }}">
							<a href="{{ route('admin.employer.index') }}">
								<i class="fas fa-user"></i>
								<p>Manage Employer</p>
							</a>
						</li>
						<li class="nav-item {{ Request::is('admin/subscriber') ? 'active' : '' }}">
							<a href="{{ route('admin.subscriber.index') }}">
								<i class="fas fa-star"></i>
								<p>Subscriber</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								<i class="fas fa-sign-out-alt"></i>
								<p>Logout</p>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					            @csrf
					            </form>
							</a>
						</li>
						@endif
						@if(Request::is('employer*'))
						<li class="nav-item {{ Request::is('employer/dashboard') ? 'active' : '' }}">
							<a href="{{route('admin.dashboard')}}">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Components</h4>
						</li>
						<li class="nav-item {{ Request::is('employer/create*') ? 'active' : '' }}">
							<a href="{{route('employer.post.create')}}">
								<i class="fas fa-file-signature"></i>
								<p>Post a New Job</p>
							</a>
						</li>
						<li class="nav-item {{ Request::is('employer/post*') ? 'active' : '' }}">
							<a href="{{route('employer.post.index')}}">
								<i class="fas fa-th-list"></i>
								<p>Jobs</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								<i class="fas fa-sign-out-alt"></i>
								<p>Logout</p>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					            @csrf
					            </form>
							</a>
						</li>
						@endif
					</ul>
				</div>
			</div>
		</div>