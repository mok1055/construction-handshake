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
            <li><a href="{{ Auth::user()->canCreateEditProject() ? route('projects.edit', $project->id) : route('projects.show', $project->id) }}">Project: {{ $project->name }}</a></li>
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
    <h3>Beoordeling overzicht</h3><br>
    <table class="projects">
        <tr>
            <th>Rol</th>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>Cijfer</th>
            <th>Opmerkingen</th>
            <th></th>
        </tr>
        @foreach($ratings as $rating)
            <tr>
                <td>{{$rating->user()->role() }}</td>
                <td>{{$rating->user()->first_name}}</td>
                <td>{{$rating->user()->last_name}}</td>
                <td>{{$rating->mark}}</td>
                <td>{{$rating->comments}}</td>
                <td><button onclick="location.href='{{ url('projects/'.$rating->project_id.'/ratings/'.$rating->id) }}'">
                        Weergeven
                    </button></td>
            </tr>
        @endforeach
    </table>
@endsection
