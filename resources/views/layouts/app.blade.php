<html lang="en">

<head>
    <title>Construction Handshake</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.ico') }}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/calendar.css') }}">
    <!--===============================================================================================-->
</head>

<body>
@section('topbar')
    <header>
        <div class="topbar">
            @if(isset(Auth::user()->email))
                <a href="{{ url('dashboard') }}"><img class="logo" src="{{ asset('images/logo-new.png') }}"></a>
                <ul>
                    <li>
                        <label class="welcome"><a href="{{ url('profile') }}" class="welcome">Welcome {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</a></label>
                    </li>
                    <br>
                    <li>
                        <label class="logout"><a href="{{ url('logout') }}" class="logout">Log uit</a></label>
                    </li>
                </ul>
            @else
                <script>
                    window.location = "/home";
                </script>
            @endif
        </div>
    </header>
@show
@section('sidebar')
    <div class="sidebar">
        <ul class="sidebar-list">
            <li><a href="{{ url('dashboard') }}" class="{{ (Request::is('dashboard')) ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ url('profile') }}" class="{{ (Request::is('profile')) ? 'active' : '' }}">Mijn profiel</a>
            </li>
            <li>
                <a href="{{ url('projects') }}" class="{{ (Request::is('projects')) ? 'active' : '' }}">Projecten overzicht</a>
            </li>
            @if (Auth::user()->canCreateEditProject())
                <li>
                    <a href="{{ url('projects/create') }}" class="{{ (Request::is('projects/create')) ? 'active' : '' }}">Project toevoegen</a>
                </li>
            @endif
            <li><a href="#agenda">Agenda</a></li>
        </ul>
    </div>
@show

<div class="content">
    @yield('content')
</div>
</body>
</html>
