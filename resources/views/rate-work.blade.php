@extends('layouts.app')

@section('sidebar')
    <div class="sidebar">
        <ul class="sidebar-list">
            <li><a href="{{ url('dashboard') }}">Home</a></li>
            <li><a href="{{ url('profile') }}">Mijn profiel</a></li>
            <li><a href="{{ url('projects') }}">Projecten overzicht</a></li>
            @if (Auth::user()->canCreateEditProject())
                <li>
                    <a href="{{ url('projects/create') }}" class="{{ (Request::is('projects/create')) ? 'active' : '' }}">Project toevoegen</a>
                </li>
            @endif
            <li><a href="{{ url('agenda') }}">Agenda</a></li>
            <li>
                <a href="{{ Auth::user()->canCreateEditProject() ? route('projects.edit', $project->id) : route('projects.show', $project->id) }}">Project: {{ $project->name }}</a>
            </li>
            <li><a href="{{ url('projects/'.$project->id.'/view-users/') }}">Personen overzicht</a></li>
            @if ($project->canRate(Auth::user()))
                <li><a href="{{ url('projects/'.$project->id.'/rate-work/') }}" class="active">Beoordeling</a></li>
            @endif
        </ul>
    </div>
@endsection

@section('content')
    <button class="btn btn-secondary" onclick="location.href='{{ Auth::user()->canCreateEditProject() ? url('projects/'.$project->id.'/edit') : url('projects/'.$project->id) }}'">
        Terug naar project
    </button>
    <br><br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <h3>Beoordeling</h3><br>
    <form action="{{ url('projects/'.$project->id.'/rate-work/add') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label id="email">Project:</label><br> <input disabled value="{{ $project->name }}"/>
        </div>
        <div class="form-group">
            <label id="email">Functie:</label><br> <input disabled value="{{ Auth::user()->role() }}"/>
        </div>
        <div class="form-group">
            <label for="description">Opmerkingen</label> <textarea class="form-control" name="comments"></textarea>
        </div>
        <div class="form-group">
            <label id="email">Cijfer *</label><br>
            <select class="browser-default custom-select dropdown-primary" name="mark" value="1">
                @for ($cijfer = 1; $cijfer <= 10; $cijfer++)
                    @if ($cijfer == 1)
                        <option selected="selected" value="{{ $cijfer }}">{{ $cijfer }}</option>
                    @else
                        <option value="{{ $cijfer }}">{{ $cijfer }}</option>
                    @endif
                @endfor
            </select>
        </div>
        <div class="form-group">
            <label id="email">Afbeelding *</label><br>
            <input type="file" name="image" class="form-control"> <br>
        </div>
        <br>
        <button class="btn btn-success">Beoordeling versturen</button>
        <br><br>
    </form>
@endsection
