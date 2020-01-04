@include('layouts.app')

<body>
<div class="content">
    <h3>Profiel</h3><br>
    <form action="{{ route('profile.update') }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class=" form-group">
            <label id="first_name">Voornaam:</label>
            <label class="form-control">{{ Auth::user()->first_name }}</label>
        </div>
        <div class="form-group">
            <label id="last_name">Achternaam:</label>
            <label class="form-control">{{ Auth::user()->last_name }}</label>
        </div>
        <div class="form-group">
            <label id="email">Email:</label>
            <label class="form-control">{{  Auth::user()->email}}</label>
        </div>
        <br>
        <div class="form-group">
            <button class="btn btn-success">Wijzigingen opslaan</button>
            <br><br>
        </div>
    </form>
</div>
</body>
