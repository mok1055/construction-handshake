@include('layouts.app')

<body>
<div class="content">
    <button class="btn btn-secondary" onclick="location.href='{{ url('dashboard') }}'">
        Terug naar dashboard
    </button>
    <br><br>
    <h3>Personen overzicht</h3><br>
    @dump($users->all())
</div>
</body>
