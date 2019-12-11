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
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h3>Project wijzigen</h3><br>
    <form action="/projects/{{ $project->id }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="name">Project naam *</label>
            <input type="text" class="form-control" name="name" value="{{ $project->name }}"/>
        </div>

        <div class="form-group">
            <label for="description">Project beschrijving *</label>
            <textarea class="form-control" name="description">{{ $project->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="status">Project status *</label><br>
            <select class="browser-default custom-select dropdown-primary" name="status">
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="start_date">Begindatum *</label><br>
            <input type="date" name="start_date" value="{{ $project->start_date->format('Y-m-d') }}">
        </div>
        <br>
        <div class="form-group">
            <label for="end_date">Einddatum *</label><br>
            <input type="date" name="end_date" value="{{ $project->end_date->format('Y-m-d') }}">
        </div>
        <br><br>
        <div class="form-group">
            <button class="btn btn-success">Wijzigingen opslaan</button>
            <br><br>
        </div>
    </form>
</div>
</body>
