@extends('layouts.app')

@section('sidebar')
    <div class="sidebar">
        <ul class="sidebar-list">
            <li><a href="{{ url('dashboard') }}" class="{{ (Request::is('dashboard')) ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ url('profile') }}" class="{{ (Request::is('profile')) ? 'active' : '' }}">Mijn profiel</a>
            </li>
            <li>
                <a href="{{ url('projects') }}" class="{{ (Request::is('projects')) ? 'active' : '' }}">Projecten overzicht</a>
            </li>
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
                <li><a href="{{ url('projects/'.$project->id.'/ratings/create') }}">Beoordeling</a></li>
            @endif
            @if (Auth::user()->canViewRatings())
                <li><a href="{{ url('projects/'.$project->id.'/ratings/') }}" class="active">Beoordelingen overzicht</a></li>
            @endif
        </ul>
    </div>
@endsection
@section('content')
    @if (Auth::user()->canViewRatings())
    <button class="btn btn-secondary" onclick="location.href='{{ url('projects/'.$project->id.'/ratings/') }}'">
        Terug naar beoordelingen
    </button>
    <br><br>
    @endif
    <h3>Beoordeling van {{ $rating->user()->first_name. ' '.$rating->user()->last_name  }}</h3>
    <br>
    <div class="form-group">
        <label id="email">Functie:</label><br> <input disabled value="{{ $rating->user()->role() }}"/>
    </div>
    <div class="form-group">
        <label for="description">Opmerkingen</label> <br><input disabled value="{{ $rating->comments }}">
    </div>
    <div class="form-group">
        <label for="description">Cijfer</label> <br><input disabled value="{{ $rating->mark }}">
    </div>
    <div class="form-group">
        <label for="description">Afbeelding</label> <br><img src="{{ Storage::url('ratings/'.$rating->image_path) }}">
    </div>
@endsection
