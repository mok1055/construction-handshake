<!DOCTYPE html>
<html>

<head>
    <title>{{ config('app.name') }}</title>
</head>

<body>
    @if(isset(Auth::user()->email))
    <div class="alert alert-danger success-block">
        <h3>Welcome {{ Auth::user()->name }}</h3>
        <a href="{{ url('/logout') }}">Logout</a>
    </div>
    @else
    <script>
        window.location = "/home";
    </script>
    @endif
</body>

</html>