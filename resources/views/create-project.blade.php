<!DOCTYPE html>
<html lang="en">

<head>
    <title>Construction Handshake</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.ico') }}" />
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
    <!--===============================================================================================-->
</head>

<body>
    <header>
        <div class="topbar">
            @if(isset(Auth::user()->email))
            <div class="header-info">
                <h3>Welcome {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
                <a href="{{ url('/logout') }}">Logout</a>
            </div>
            @else
            <script>
                window.location = "/main";
            </script>
            @endif
        </div>
    </header>
    <!-- The sidebar -->
    <div class="sidebar">
        <a class="active" href="#home">Dashboard</a>
        <a href="#news">News</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
    </div>

    <!-- Page content -->
    <div class="content">
        <h3>Project toevoegen</h3><br>
        <form method="post" action="{{ route('projects.store') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Naam:</label>
                <input type="text" class="form-control" name="name" />
            </div>

            <div class="form-group">
                <label for="description">Beschrijving:</label>
                <textarea class="form-control" name="description"></textarea>
            </div>
        </form>
    </div>
</body>