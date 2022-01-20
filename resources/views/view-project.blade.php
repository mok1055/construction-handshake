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
                <a href="{{ Auth::user()->canCreateEditProject() ? route('projects.edit', $project->id) : route('projects.show', $project->id) }}" class="active">Project: {{ $project->name }}</a>
            </li>
            <li><a href="{{ url('projects/'.$project->id.'/view-users/') }}">Personen overzicht</a></li>
        </ul>
    </div>
@endsection

@section('content')
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
    <h3>{{ $project->name }}</h3><br>
    <form action="{{ url('projects/'.$project->id.'/add-user') }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('POST') }}
        <div class="form-group">
            <label>Project beschrijving</label>
            <textarea class="form-control" disabled>{{ $project->description }}</textarea>
        </div>
        <div class="add-person">
            @if (Auth::user()->canAddDeleteUser())
                <label for="name">Persoon toevoegen</label>
                <div class="input-group">
                    <input type="email" class="form-control" size="34" name="email"/> <span class="input-group-btn"><button class="btn btn-success" name="action" value="add-person">Voeg toe aan project</button></span>
                </div>
                <br>
            @endif
            <button class="btn btn-secondary" onclick="location.href='{{ url('projects/'.$project->id.'/view-users') }}'" type="button">Personen overzicht inzien
            </button>
        </div>
        <div class="form-group">
            <label>Project status</label><br> <input disabled value="{{ $project->status()->name }}">
        </div>
        <br>
        <div class="form-group">
            <label>Begindatum</label><br> <input disabled value="{{ $project->start_date->format('d-m-Y') }}">
        </div>
        <br>
        <div class="form-group">
            <label>Einddatum</label><br> <input disabled value="{{ $project->end_date->format('d-m-Y') }}">
        </div>
    </form>
@endsection
