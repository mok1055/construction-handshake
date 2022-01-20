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
            <li><a href="{{ url('projects/'.$project->id.'/view-users/') }}" class="active">Personen overzicht</a></li>
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
    <h3>{{ $project->name }} - Personen overzicht</h3><br>
    <table class="projects">
        <tr>
            <th>Rol</th>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>E-mailadres</th>
            @if (Auth::user()->canAddDeleteUser())
                <th></th>
            @endif
        </tr>
        @foreach($project->users() as $user)
            <tr>
                <td>{{$user->role() }}</td>
                <td>{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->email}}</td>
                @if (Auth::user()->canAddDeleteUser() && Auth::user()->id != $user->id)
                    <td>
                        <form action="{{ url('projects/'.$project->id.'/delete-user/'.$user->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">
                                X
                            </button>
                        </form>
                    </td>
                @endif
            </tr>
        @endforeach
    </table>
@endsection
