@include('layouts.app')

<body>
<div class="content">
    <button class="btn btn-secondary" onclick="location.href='{{ url('dashboard') }}'">
        Terug naar dashboard
    </button>
    <br><br>
    <h3>Profiel</h3><br>
    <form action="{{ url('profile/update') }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class=" form-group">
            <label id="first_name">Voornaam:</label>
            <input type="text" class="form-control" name="first_name" value="{{ Auth::user()->first_name }}"/>
        </div>
        <div class="form-group">
            <label id="last_name">Achternaam:</label>
            <input type="text" class="form-control" name="last_name" value="{{ Auth::user()->last_name }}"/>
        </div>
        <div class="form-group">
            <label id="email">E-mail:</label>
            <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}"/>
        </div>
        <br>
        <div class="form-group">
            <button class="btn btn-success">Wijzigingen opslaan</button>
            <br><br>
        </div>
    </form>
</div>
</body>
