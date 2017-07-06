<!-- Header starts -->
<header>

	<!-- Logo starts -->
	<a href="{{ url('/') }}" class="logo">
		<img src="{{  asset('/img/logo.png') }}" alt="Teleusuario" />
	</a>
	<!-- Logo ends -->

	<!-- Header actions starts -->
	<ul id="header-actions" class="clearfix">
		<li class="list-box hidden-xs dropdown @if(count(Auth::user()->unreadNotifications)) blink_icon @endif">
			<a id="drop3" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
				<i class="icon-bell2"></i>
			</a>
			<span class="info-label red-bg">{{ count(Auth::user()->unreadNotifications) }}</span>
			<ul class="dropdown-menu imp-notify">
				<li class="dropdown-header">{{ trans('dashboard.header.notifications.message1') }} {{ count(Auth::user()->unreadNotifications) }} {{ trans('dashboard.header.notifications.message2') }}</li>
				<?php $i=0; ?>
				@foreach(Auth::user()->unreadNotifications as $notification)
					@if($i < 3)
					<li>
						<div class="details">
							<span class="text-@if($notification->type===1) danger @elseif($notification->type===2) warning @else info @endif">{{ $notification->message }}</span>
						</div>
					</li>
					@endif
					<?php $i++; ?>
				@endforeach

				<li class="dropdown-footer"><a href="{{ route('dashboard.notifications') }}">{{ trans('dashboard.header.notifications.all_notifications') }}</a></li>
			</ul>
		</li>
		<li class="list-box user-admin hidden-xs dropdown">
			<div class="admin-details">
				<div class="name"><strong>{!! Auth::user()->name !!}</strong></div>
				<div class="designation"><strong>{{ trans('dashboard.header.code') }}</strong> {!! Auth::user()->code !!}</div>
			</div>
			<a id="drop4" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
				<i class="icon-user"></i>
			</a>
			<ul class="dropdown-menu sm">
				<li class="dropdown-content">
					<a href="{{ route('dashboard.profile') }}">{{ trans('dashboard.header.profile') }}</a>
					<a href="{{ route('dashboard.change_pwd') }}">{{ trans('dashboard.header.change_pwd') }}</a>
					<a href="styled-inputs.html">Settings</a>
					<a href="{{ url('logout') }}"
					   onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
						{{ trans('dashboard.header.logout') }}
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				</li>
			</ul>
		</li>
		<li>
			<button type="button" id="toggleMenu" class="toggle-menu">
				<i class="collapse-menu-icon"></i>
			</button>
		</li>
	</ul>
	<!-- Header actions ends -->

	<!--<div class="custom-search hidden-sm hidden-xs">
		<input type="text" class="search-query" placeholder="Search here ...">
		<i class="icon-search3"></i>
	</div>-->
</header>
<!-- Header ends -->