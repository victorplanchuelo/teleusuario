<!-- Header starts -->
<header>

	<!-- Logo starts -->
	<a href="{{ url('/') }}" class="logo">
		<img src="{{  asset('/img/logo.png') }}" alt="Teleusuario" />
	</a>
	<!-- Logo ends -->

	<!-- Header actions starts -->
	<ul id="header-actions" class="clearfix">
		@include('main.inc.notifications')
	</ul>
	<!-- Header actions ends -->

	<!--<div class="custom-search hidden-sm hidden-xs">
		<input type="text" class="search-query" placeholder="Search here ...">
		<i class="icon-search3"></i>
	</div>-->
</header>
<!-- Header ends -->