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
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet" media="screen">

    <!-- Animate CSS -->
    <link href="{{ asset('/css/animate.css') }}" rel="stylesheet" media="screen">

    <!-- Ion Icons -->
    <link href="{{ asset('/fonts/icomoon/icomoon.css') }}" rel="stylesheet" />



    <!-- Animate CSS -->
    <link href="{{ asset('/css/c3/c3.css') }}" rel="stylesheet" media="screen">

    <!-- Ion Icons -->
    <link href="{{ asset('/css/nvd3/nv.d3.css') }}" rel="stylesheet" />

    <!-- Animate CSS -->
    <link href="{{ asset('/css/horizontal-bar/chart.css') }}" rel="stylesheet" media="screen">

    <!-- Ion Icons -->
    <link href="{{ asset('/css/heatmap/cal-heatmap.css') }}" rel="stylesheet" />

    <!-- Animate CSS -->
    <link href="{{ asset('/css/circliful/circliful.css') }}" rel="stylesheet" media="screen">

    <!-- Ion Icons -->
    <link href="{{ asset('/css/odometer.css') }}" rel="stylesheet" />



    <!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="{{ asset('/js/html5shiv.js') }}"></script>
        <script src="{{ asset('/js/respond.min.js') }}"></script>
    <![endif]-->


    <!-- Scripts -->
    <script>
		window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>
<body>
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
                    <div class="name">{!! Auth::user()->name !!}</div>
                    <div class="designation">{!! Auth::user()->code !!}</div>
                </div>
                <a id="drop4" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-user"></i>
                </a>
                <ul class="dropdown-menu sm">
                    <li class="dropdown-content">
                        <a href="profile.html">Edit Profile</a>
                        <a href="forgot-pwd.html">Change Password</a>
                        <a href="styled-inputs.html">Settings</a>
                        <a href="login.html">Logout</a>
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
                    <span class="menu-item">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="icon-lab3"></i>
                    <span class="menu-item">Projects</span>
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

    <!-- Dashboard Wrapper Start -->
    <div class="dashboard-wrapper dashboard-wrapper-lg">


        @yield('content')

        <!-- Container fluid Starts -->
        <!--<div class="container-fluid">-->

            <!-- Top Bar Starts -->
            <!--<div class="top-bar clearfix">
                <div class="row gutter">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="page-title">
                            <h3>Dashboard</h3>
                            <p>Welcome to Admin Dashboard</p>
                        </div>
                    </div>
                </div>
            </div>-->
            <!-- Top Bar Ends -->

        <!--</div>-->
        <!-- Container fluid ends -->

    </div>
    <!-- Dashboard Wrapper End -->

    <!-- Footer Start -->
    <footer>
        Copyright Cartuja Ele S.L. <span>{{ date('Y') }}</span>
    </footer>
    <!-- Footer end -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>


    <!-- Sparkline Graphs -->
    <!-- <script src="js/sparkline/sparkline.js"></script> -->
    <script src="{{ asset('js/sparkline/retina.js') }}"></script>
    <script src="{{ asset('js/sparkline/custom-sparkline.js') }}"></script>

    <!-- jquery ScrollUp JS -->
    <script src="{{ asset('js/scrollup/jquery.scrollUp.js') }}"></script>

    <!-- D3 JS -->
    <script src="{{ asset('js/d3/d3.v3.min.js') }}"></script>

    <!-- D3 Power Gauge -->
    <script src="{{ asset('js/d3/d3.powergauge.js') }}"></script>

    <!-- D3 Meter Gauge Chart -->
    <script src="{{ asset('js/d3/gauge.js') }}"></script>
    <script src="{{ asset('js/d3/gauge-custom.js') }}"></script>

    <!-- C3 Graphs -->
    <script src="{{ asset('js/c3/c3.min.js') }}"></script>
    <script src="{{ asset('js/c3/c3.custom.js') }}"></script>

    <!-- NVD3 JS -->
    <script src="{{ asset('js/nvd3/nv.d3.js') }}"></script>
    <script src="{{ asset('js/nvd3/nv.d3.custom.boxPlotChart.js') }}"></script>
    <script src="{{ asset('js/nvd3/nv.d3.custom.stackedAreaChart.js') }}"></script>

    <!-- Horizontal Bar JS -->
    <script src="{{ asset('js/horizontal-bar/horizBarChart.min.js') }}"></script>
    <script src="{{ asset('js/horizontal-bar/horizBarCustom.js') }}"></script>

    <!-- Gauge Meter JS -->
    <script src="{{ asset('js/gaugemeter/gaugeMeter-2.0.0.min.js') }}"></script>
    <script src="{{ asset('js/gaugemeter/gaugemeter.custom.js') }}"></script>

    <!-- Calendar Heatmap JS -->
    <!--<script src="{{ asset('js/heatmap/cal-heatmap.min.js') }}"></script>
    <script src="{{ asset('js/heatmap/cal-heatmap.custom.js') }}"></script>-->

    <!-- Odometer JS -->
    <!--<script src="{{ asset('js/odometer/odometer.min.js') }}"></script>
    <script src="{{ asset('js/odometer/custom-odometer.js') }}"></script>-->

    <!-- Peity JS -->
    <script src="{{ asset('js/peity/peity.min.js') }}"></script>
    <script src="{{ asset('js/peity/custom-peity.js') }}"></script>

    <!-- Circliful js -->
    <script src="{{ asset('js/circliful/circliful.min.js') }}"></script>
    <script src="{{ asset('js/circliful/circliful.custom.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('js/custom.js') }}"></script>


</body>
</html>
