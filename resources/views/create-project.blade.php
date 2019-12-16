@include('layouts.app')

<body>
<div class="content">
    <button class="btn btn-secondary" onclick="location.href='{{ url('dashboard') }}'">
        Terug naar dashboard
    </button>
    <br><br>
    <h3>Project toevoegen</h3><br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->unique() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('projects.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Project naam *</label>
            <input type="text" class="form-control" name="name"/>
        </div>

        <div class="form-group">
            <label for="description">Project beschrijving *</label>
            <textarea class="form-control" name="description"></textarea>
        </div>
        <br>
        <div class="form-group">
            <label for="start_date">Begindatum *</label><br>
            <input type="date" name="start_date">
        </div>
        <br>
        <div class="form-group">
            <label for="end_date">Einddatum *</label><br>
            <input type="date" name="end_date">
        </div>
        <br><br>
        <div class="form-group">
            <button class="btn btn-success">Project toevoegen</button>
            <br><br>
        </div>
    </form>
    </form>
</div>
</body>
