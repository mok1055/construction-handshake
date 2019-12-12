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
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/calendar.css') }}">
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
        <div class="planning">
            <div></div>
            <h2>Facturen</h2><br>
            <button onclick="location.href='{{ url('invoice/add') }}'"type="button" class="btn btn-success">Factuur toevoegen</button><br><br>
            <table class="table-fill">
                <tr>
                    <th>Factuurnummer</th>
                    <th>Beschrijving</th>
                    <th>Bedrag</th>
                    <th></th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Testfactuur</td>
                    <td>€500</td>
                    <td><button>Check</button></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Test2</td>
                    <td>€250</td>
                    <td><button>Check</button></td>
                </tr>
            </table>
        </div>
        

            <script src="../js/projects.js"></script>
                <script src="../js/calendar.js"></script>
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                  crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
                  integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
                  crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
                  integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
                  crossorigin="anonymous"></script>
</body>
