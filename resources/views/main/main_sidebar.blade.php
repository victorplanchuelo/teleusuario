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
			<img id="img-sidebar" src="@if(is_null(Auth::user()->thumb_path)) {{ asset('/img/thumbs/user.png') }} @else {{ asset('/storage/'.Auth::user()->thumb_path) }} @endif" alt="User Info">
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

		<?php
			$clase=0;
			foreach($services as $service)
			{
				if(request()->is('dashboard/services/' . $service->name))
				{
					$clase=1;
					break;
				}
			}
		?>

		<li @if($clase!=0) class="active" @endif>
			<a href="#">
				<i class="icon-lab3"></i>
				<span class="menu-item">{{ trans('dashboard.navbar.teleusuario.title') }}</span>
				<span class="down-arrow"></span>
			</a>
			<ul>

				@foreach($services as $service)
					<li class="{{request()->is('dashboard/services/' . $service->name) ? 'active selected' : ''}}">
						<a href='{{ url($service->path) }}'>{{ trans('dashboard.navbar.teleusuario.' . $service->name) }}</a>
					</li>
				@endforeach
			</ul>
		</li>

		<li class="{{ (request()->is('dashboard/tasks/completed_tasks') || request()->is('dashboard/tasks/ranking'))?'active':'' }}">
			<a href="#">
				<i class="icon-trophy"></i>
				<span class="menu-item">{{ trans('dashboard.navbar.tasks.title') }}</span>
				<span class="down-arrow"></span>
			</a>
			<ul>
				<li class="{{request()->is('dashboard/tasks/completed_tasks') ? 'active selected' : ''}}">
					<a href='#'>{{ trans('dashboard.navbar.tasks.completed_tasks') }}</a>
				</li>
				<li class="{{request()->is('dashboard/tasks/ranking') ? 'active selected' : ''}}">
					<a href='{{ route('dashboard.tasks.ranking') }}'>{{ trans('dashboard.navbar.tasks.ranking') }}</a>
				</li>
			</ul>
		</li>

		<li class="{{ (request()->is('dashboard/tickets/*'))?'active':'' }}">
			<a href="#">
				<i class="icon-pricetags"></i>
				<span class="menu-item">{{ trans('dashboard.navbar.tickets.title') }}</span>
				<span class="down-arrow"></span>
			</a>
			<ul>
				<li class="{{request()->is('dashboard/tickets/my-tickets') ? 'active selected' : ''}}">
					<a href='{{ route('dashboard.tickets.list') }}'>{{ trans('dashboard.navbar.tickets.list') }}</a>
				</li>
				<li class="{{request()->is('dashboard/tickets/new') ? 'active selected' : ''}}">
					<a href='{{ route('dashboard.tickets.new') }}'>{{ trans('dashboard.navbar.tickets.new') }}</a>
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