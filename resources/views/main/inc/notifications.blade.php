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
				<li class="notification">
					<div class="icon">
						<i class="@if($notification->data['type']==="1") text-danger @elseif($notification->data['type']==="2") text-warning @elseif($notification->data['type']==="3")) text-info @else text-success @endif @if($notification->data['type']==="1") icon-cross2 @elseif($notification->data['type']==="2") icon-info @elseif($notification->data['type']==="3")) icon-comment-stroke @else icon-trophy @endif"></i>
					</div>
					<div class="details">
						<strong>{!! nl2br(e($notification->data['message'])) !!} </strong>
					</div>
				</li>
			@endif
			<?php $i++; ?>
		@endforeach

		<a class="all-notifications" href="{{ route('dashboard.notifications') }}">
			<span class="dropdown-footer">
				<strong>{{ trans('dashboard.header.notifications.all_notifications') }}</strong>
			</span>
		</a>
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