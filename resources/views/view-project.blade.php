@include('layouts.app')

<body>
<div class="content">
    <button class="btn btn-secondary" onclick="location.href='{{ url('dashboard') }}'">
        Terug naar dashboard
    </button>
    <br><br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->unique() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h3>{{ $project->name }}</h3><br>
    <div class="form-group">
        <label>Project beschrijving</label>
        <textarea class="form-control" disabled>{{ $project->description }}</textarea>
    </div>
    <div class="form-group">
        <label>Project status</label><br>
        <input disabled value="{{ $project->status() }}">
    </div>
    <br>
    <div class="form-group">
        <label>Begindatum</label><br>
        <input disabled value="{{ $project->start_date->format('d-m-Y') }}">
    </div>
    <br>
    <div class="form-group">
        <label>Einddatum</label><br>
        <input disabled value="{{ $project->end_date->format('d-m-Y') }}">
    </div>
</div>
</body>
