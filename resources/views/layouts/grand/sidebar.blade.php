<div class="col-sm-12 col-lg-4 col-xl-3 dn-smd">
    <div class="user_profile">
      @if(Request::is('admin*'))
        <div class="media">
            <div class="media-body">
                <h5 class="mt-0"> ADMINISTRATOR </h5>
            </div>
        </div>
      @endif
      @if(Request::is('employer*'))
        <div class="media">
            <img src="/profile/{{ Auth::user()->image }}" class="align-self-start mr-3 rounded-circle" alt="e1.png">
            <div class="media-body">
                <h5 class="mt-0">{{ ucwords(Auth::user()->name) }}</h5>
                <h5 class="text-thm2"> {{ ucwords(Auth::user()->company) }} </h5>
            </div>
        </div>
      @endif
    </div>
    <div class="dashbord_nav_list">
        <ul>
            @if(Request::is('admin*'))
            <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}"><a href="{{route('admin.dashboard')}}"><span class="flaticon-dashboard"></span> Dashboard</a></li>
            <li class="{{ Request::is('admin/pending/post') ? 'active' : '' }}"><a href="{{ route('admin.post.pending') }}"><span class="flaticon-paper-plane"></span> Pending Jobs</a></li>
            <li class="{{ Request::is('admin/post') ? 'active' : '' }}"><a href="{{route('admin.post.index')}}"><span class="flaticon-paper-plane"></span> Manage Jobs</a></li>
            <li class="{{ Request::is('admin/employers') ? 'active' : '' }}"><a href="{{ route('admin.employer.index') }}"><span class="flaticon-analysis"></span> Employer</a></li>
            <li class="{{ Request::is('admin/category*') ? 'active' : '' }}"><a href="{{ route('admin.category.index') }}"><span class="flaticon-analysis"></span> Manage Categories</a></li>
            {{-- <li class="{{ Request::is('admin/tag*') ? 'active' : '' }}"><a href="{{ route('admin.tag.index') }}"><span class="flaticon-chat"></span> Manage Tags</a></li> --}}
            <li class="{{ Request::is('admin/employment*') ? 'active' : '' }}"><a href="{{ route('admin.employment.index') }}"><span class="flaticon-analysis"></span> Manage Employment</a></li>
            <li class="{{ Request::is('admin/subscriber') ? 'active' : '' }}"><a href="{{ route('admin.subscriber.index') }}"><span class="flaticon-favorites"></span> Subcribers</a></li>
            <li class="{{ Request::is('admin/settings') ? 'active' : '' }}"><a href="{{ route('admin.settings') }}"><span class="flaticon-locked"></span> Change Password</a></li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="flaticon-logout"></span> Logout</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @endif
            @if(Request::is('employer*'))
            <li class="{{ Request::is('employer/dashboard') ? 'active' : '' }}"><a href="{{route('employer.dashboard')}}"><span class="flaticon-dashboard"></span> Dashboard</a></li>
            <li class="{{ Request::is('employer/company-profile') ? 'active' : '' }}"><a href="{{route('employer.profile')}}"><span class="flaticon-profile"></span> Company Profile</a></li>
            <li class="{{ Request::is('employer/create*') ? 'active' : '' }}"><a href="{{route('employer.post.create')}}"><span class="flaticon-paper-plane"></span> Post a New Job</a></li>
            <li class="{{ Request::is('employer/post*') ? 'active' : '' }}"><a href="{{route('employer.post.index')}}"><span class="flaticon-paper-plane"></span> Manage Jobs</a></li>
            <li class="{{ Request::is('employer/settings') ? 'active' : '' }}"><a href="{{ route('employer.settings') }}"><span class="flaticon-locked"></span> Change Password</a></li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="flaticon-logout"></span> Logout</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @endif
        </ul>
    </div>
</div>
