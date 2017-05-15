<!-- Left sidebar start -->
<div class="vertical-nav">

	<!-- Collapse menu starts -->
	<button class="collapse-menu">
		<i class="icon-menu2"></i>
	</button>
	<!-- Collapse menu ends -->

	<!-- Current user starts -->
	<div class="user-details clearfix">
		<a href="{{ route('dashboard.profile') }}" class="user-img">
			<img src="{{ asset('/img/thumbs/user.png') }}" alt="User Info">
			<!--<span class="likes-info">9</span>-->
		</a>
		<h5 class="user-name">{!! Auth::user()->name !!}</h5>
	</div>
	<!-- Current user ends -->

	<!-- Sidebar menu start -->
	<ul class="menu clearfix">
		<li class="{{request()->is('dashboard') ? 'active selected' : ''}}">
			<a href="{{ route('dashboard.home') }}">
				<i class="icon-air-play"></i>
				<span class="menu-item">{{ trans('dashboard.title') }}</span>
			</a>
		</li>
		<li>
			<a href="#">
				<i class="icon-lab3"></i>
				<span class="menu-item">{{ trans('dashboard.navbar.teleusuario.title') }}</span>
				<span class="down-arrow"></span>
			</a>
			<ul>
				<li>
					<a href='tasks.html'>Tasks</a>
				</li>
				<li>
					<a href='cards.html'>Cards</a>
				</li>
				<li>
					<a href='users.html'>Users</a>
				</li>
				<li>
					<a href='project-list.html'>Project List</a>
				</li>
			</ul>
		</li>

		<li class="{{ (request()->is('dashboard/profile') || request()->is('dashboard/password/change'))?'active':'' }}">
			<a href="#">
				<i class="icon-settings"></i>
				<span class="menu-item">{{ trans('dashboard.navbar.settings.title') }}</span>
				<span class="down-arrow"></span>
			</a>
			<ul>
				<li class="{{request()->is('dashboard/profile') ? 'active selected' : ''}}">
					<a href='{{ route('dashboard.profile') }}'>{{ trans('dashboard.navbar.settings.profile') }}</a>
				</li>
				<li class="{{request()->is('dashboard/password/change') ? 'active selected' : ''}}">
					<a href='{{ route('dashboard.change_pwd') }}'>{{ trans('dashboard.navbar.settings.change_pwd') }}</a>
				</li>
				<li>
					<a href="{{ url('logout') }}"
					   onclick="event.preventDefault();
                       document.getElementById('logout-form1').submit();">
						{{ trans('dashboard.navbar.settings.logout') }}
					</a>
					<form id="logout-form1" action="{{ route('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				</li>
			</ul>
		</li>
	</ul>
	<!-- Sidebar menu snd -->
</div>
<!-- Left sidebar end -->