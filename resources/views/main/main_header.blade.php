<!-- Header starts -->
<header>

	<!-- Logo starts -->
	<a href="{{ url('/') }}" class="logo">
		<img src="{{  asset('/img/logo.png') }}" alt="Teleusuario" />
	</a>
	<!-- Logo ends -->

	<!-- Header actions starts -->
	<ul id="header-actions" class="clearfix">
		<li class="list-box hidden-xs dropdown">
			<a id="drop2" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
				<i class="icon-warning2"></i>
			</a>
			<span class="info-label blue-bg">5</span>
		<!--<ul class="dropdown-menu imp-notify">
                    <li class="dropdown-header">You have 3 notifications</li>
                    <li>
                        <div class="icon">
                            <img src="{{ asset('/img/thumbs/user10.png') }}" alt="Arise Admin">
                        </div>
                        <div class="details">
                            <strong class="text-danger">Rogie King</strong>
                            <span>Firefox is a free, open-source web browser from Mozilla.</span>
                        </div>
                    </li>
                    <li>
                        <div class="icon">
                            <img src="img/thumbs/user6.png" alt="Arise Admin">
                        </div>
                        <div class="details">
                            <strong class="text-success">Dan Cederholm</strong>
                            <span>IE is a free web browser from Microsoft.</span>
                        </div>
                    </li>
                    <li>
                        <div class="icon">
                            <img src="img/thumbs/user1.png" alt="Arise Admin">
                        </div>
                        <div class="details">
                            <strong class="text-info">Justin Mezzell</strong>
                            <span>Safari is known for its sleek design and ease of use.</span>
                        </div>
                    </li>
                    <li class="dropdown-footer">See all the notifications</li>
                </ul>-->
		</li>
		<li class="list-box hidden-xs dropdown">
			<a id="drop3" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
				<i class="icon-archive2"></i>
			</a>
			<span class="info-label red-bg">3</span>
			<!--<ul class="dropdown-menu progress-info">
				<li class="dropdown-header">You have 7 pending tasks</li>
				<li>
					<div class="progress-info">
						<strong class="text-danger">Critical</strong>
						<span>New Dashboard Design</span>
						<span class="pull-right text-danger">20%</span>
					</div>
					<div class="progress progress-md no-margin">
						<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
							<span class="sr-only">20% Complete (success)</span>
						</div>
					</div>
				</li>
				<li>
					<div class="progress-info">
						<strong class="text-info">Primary</strong>
						<span>UI Changes in V2</span>
						<span class="pull-right">90%</span>
					</div>
					<div class="progress progress-sm no-margin">
						<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
							<span class="sr-only">90% Complete</span>
						</div>
					</div>
				</li>
				<li>
					<div class="progress-info">
						<strong class="text-warning">Urgent</strong>
						<span>Bug Fix #123</span>
						<span class="pull-right">60%</span>
					</div>
					<div class="progress progress-xs no-margin">
						<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
							<span class="sr-only">60% Complete (warning)</span>
						</div>
					</div>
				</li>
				<li>
					<div class="progress-info">
						<span>Bug Fix #111</span>
						<span class="pull-right text-success">Complete</span>
					</div>
					<div class="progress progress-xs no-margin">
						<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
							<span class="sr-only">100% Complete (warning)</span>
						</div>
					</div>
				</li>
				<li class="dropdown-footer">See all the tasks</li>
			</ul>-->
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