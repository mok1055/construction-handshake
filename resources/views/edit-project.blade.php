@include('layouts.app')

<body>
<div class="content">
    <button class="btn btn-secondary" onclick="location.href='{{ url('dashboard') }}'">
        Terug naar dashboard
    </button>
    <br><br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->unique() as $error)
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
            <label for="description">Project beschrijving</label>
            <textarea class="form-control" name="description">{{ $project->description }}</textarea>
        </div>
        <div class="add-person">
            <label for="name">Persoon toevoegen</label>
            <div class="input-group">
                <input type="email" class="form-control" size="34" name="email"/>
                <span class="input-group-btn"><button class="btn btn-success" name="action" value="add-person">Voeg toe aan project</button></span>
            </div>
            <br>
            <button class="btn btn-secondary"
                    onclick="location.href='{{ url('projects/'.$project->id.'/view-users') }}'" type="button">Personen
                overzicht inzien
            </button>
        </div>

        <div class="form-group">
            <label for="status">Project status *</label><br>
            <select class="browser-default custom-select dropdown-primary" name="status" value="1">
                @foreach($statuses as $status)
                    @if ($status->id == $project->status()->id)
                        <option selected="selected" value="{{ $status->id }}">{{ $status->name }}</option>
                    @else
                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                    @endif
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
            <button class="btn btn-success" name="action" value="update">Wijzigingen opslaan</button>
            <br><br>
        </div>

    </form>
</div>
</body>
