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
            <h2>Projecten</h2><br>
            <button onclick="location.href='{{ url('dashboard/project/add') }}'"type="button" class="btn btn-success">Project toevoegen</button><br><br>
            <table class="table-fill">
                <tr>
                    <th>Naam</th>
                    <th>Beschrijving</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Start datum</th>
                    <th>Eind datum</th>
                </tr>
                @foreach($projects as $project)
                <tr>
                    <td>{{$project->name}}</td>
                    <td>{{$project->description}}</td>
                    <td>{{$project->type}}</td>
                    <td>{{$project->status}}</td>
                    <td>{{$project->start_date->format('d-m-Y')}}</td>
                    <td>{{$project->end_date->format('d-m-Y')}}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="agenda">
            <h2>Agenda</h2>
            <div class="col-sm-4 col-md-7 col-lg-4 mt-5">
                <div class="card">
                    <h3 class="card-header" id="monthAndYear"></h3>
                    <table class="table table-bordered table-responsive-sm" id="calendar">
                        <thead>
                            <tr>
                                <th>Sun</th>
                                <th>Mon</th>
                                <th>Tue</th>
                                <th>Wed</th>
                                <th>Thu</th>
                                <th>Fri</th>
                                <th>Sat</th>
                            </tr>
                        </thead>

                        <tbody id="calendar-body">

                        </tbody>
                    </table>

                    <div class="form-inline">

                        <button class="btn btn-outline-primary col-sm-6" id="previous"
                            onclick="previous()">Previous</button>

                        <button class="btn btn-outline-primary col-sm-6" id="next" onclick="next()">Next</button>
                    </div>
                    <br />
                    <form class="form-inline">
                        <label class="lead mr-2 ml-2" for="month">Jump To: </label>
                        <select class="form-control col-sm-4" name="month" id="month" onchange="jump()">
                            <option value=0>Jan</option>
                            <option value=1>Feb</option>
                            <option value=2>Mar</option>
                            <option value=3>Apr</option>
                            <option value=4>May</option>
                            <option value=5>Jun</option>
                            <option value=6>Jul</option>
                            <option value=7>Aug</option>
                            <option value=8>Sep</option>
                            <option value=9>Oct</option>
                            <option value=10>Nov</option>
                            <option value=11>Dec</option>
                        </select>


                        <label for="year"></label><select class="form-control col-sm-4" name="year" id="year"
                            onchange="jump()">
                            <option value=1990>1990</option>
                            <option value=1991>1991</option>
                            <option value=1992>1992</option>
                            <option value=1993>1993</option>
                            <option value=1994>1994</option>
                            <option value=1995>1995</option>
                            <option value=1996>1996</option>
                            <option value=1997>1997</option>
                            <option value=1998>1998</option>
                            <option value=1999>1999</option>
                            <option value=2000>2000</option>
                            <option value=2001>2001</option>
                            <option value=2002>2002</option>
                            <option value=2003>2003</option>
                            <option value=2004>2004</option>
                            <option value=2005>2005</option>
                            <option value=2006>2006</option>
                            <option value=2007>2007</option>
                            <option value=2008>2008</option>
                            <option value=2009>2009</option>
                            <option value=2010>2010</option>
                            <option value=2011>2011</option>
                            <option value=2012>2012</option>
                            <option value=2013>2013</option>
                            <option value=2014>2014</option>
                            <option value=2015>2015</option>
                            <option value=2016>2016</option>
                            <option value=2017>2017</option>
                            <option value=2018>2018</option>
                            <option value=2019>2019</option>
                            <option value=2020>2020</option>
                            <option value=2021>2021</option>
                            <option value=2022>2022</option>
                            <option value=2023>2023</option>
                            <option value=2024>2024</option>
                            <option value=2025>2025</option>
                            <option value=2026>2026</option>
                            <option value=2027>2027</option>
                            <option value=2028>2028</option>
                            <option value=2029>2029</option>
                            <option value=2030>2030</option>
                        </select></form>
                </div>
            </div>
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
