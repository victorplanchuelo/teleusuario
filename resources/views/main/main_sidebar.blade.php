<!-- Left sidebar start -->
<div class="vertical-nav">

	<!-- Collapse menu starts -->
	<button class="collapse-menu">
		<i class="icon-menu2"></i>
	</button>
	<!-- Collapse menu ends -->

	<!-- Current user starts -->
	<div class="user-details clearfix">
		<a href="profile.html" class="user-img">
			<img src="{{ asset('/img/thumbs/user.png') }}" alt="User Info">
			<!--<span class="likes-info">9</span>-->
		</a>
		<h5 class="user-name">{!! Auth::user()->name !!}</h5>
	</div>
	<!-- Current user ends -->

	<!-- Sidebar menu start -->
	<ul class="menu clearfix">
		<li class="active selected">
			<a href="#">
				<i class="icon-air-play"></i>
				<span class="menu-item">{{ trans('dashboard.title') }}</span>
			</a>
		</li>
		<li>
			<a href="#">
				<i class="icon-lab3"></i>
				<span class="menu-item">{{ trans('dashboard.navbar.teleusuario') }}</span>
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
	</ul>
	<!-- Sidebar menu snd -->
</div>
<!-- Left sidebar end -->