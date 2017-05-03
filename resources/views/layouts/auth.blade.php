<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Teleusuario" />
	<meta name="keywords" content="Teleusuario" />
	<meta name="author" content="Cartuja Ele S.L." />
	<link rel="shortcut icon" href="{{ asset('img/fav.png') }}">
	<title>{{ config('app.name', 'Teleusuario') }}</title>

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">


	<!-- JQUERY UI CSS -->
	<link href="{{ asset('/css/jquery-ui.min.css') }}" rel="stylesheet" media="screen" />

	<!-- Bootstrap CSS -->
	<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" media="screen" />

	<!-- Error CSS -->
	<link href="{{ asset('/css/login.css') }}" rel="stylesheet" media="screen">

	<!-- Animate CSS -->
	<link href="{{ asset('/css/animate.css') }}" rel="stylesheet" media="screen">

	<!-- Ion Icons -->
	<link href="{{ asset('/fonts/icomoon/icomoon.css') }}" rel="stylesheet" />

	<!-- Scripts -->
	<script>
		window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
	</script>
</head>
<body>
<div id="app">
	@yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('/js/app.js') }}"></script>


@yield('scripts')
</body>
</html>