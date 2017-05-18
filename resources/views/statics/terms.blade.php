<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Teleusuario" />
	<meta name="keywords" content="Teleusuario" />
	<meta name="author" content="Cartuja Ele S.L." />
	<link rel="shortcut icon" href="{{ asset('img/fav.png') }}">
	<title>{{ config('app.name', 'Teleusuario') }}</title>

	<!-- JQUERY UI CSS -->
	<link href="{{ asset('/css/jquery-ui.min.css') }}" rel="stylesheet" media="screen" />

	<!-- Bootstrap CSS -->
	<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" media="screen" />

	<!-- Animate CSS -->
	<link href="{{ asset('/css/animate.css') }}" rel="stylesheet" media="screen">

	<!-- Ion Icons -->
	<link href="{{ asset('/fonts/icomoon/icomoon.css') }}" rel="stylesheet" />
</head>


<body>

<!-- Dashboard Wrapper Start -->
<div class="dashboard-wrapper dashboard-wrapper-lg">

	<!-- Container fluid Starts -->
	<div class="container-fluid">

		<!-- Row starts -->
		<div class="row gutter">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				AQUI IRAN LOS TERMINOS Y CONDICIONES
			</div>
		</div>
		<!-- Row ends -->

	</div>
	<!-- Container fluid ends -->

</div>
<!-- Dashboard Wrapper End -->

<!-- Footer Start -->
<footer>
	&copy; Cartuja Ele S.L. <span>{{ date('Y') }}</span>
</footer>
<!-- Footer end -->


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

<!-- JQuery Scripts -->
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>

<!-- jquery ScrollUp JS -->
<script src="{{ asset('js/scrollup/jquery.scrollUp.js') }}"></script>

<!-- JQuery Scripts -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>
</html>