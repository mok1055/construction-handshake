@extends('layouts.app')

@section('sidebar')
    <div class="sidebar">
        <ul class="sidebar-list">
            <li><a href="{{ url('dashboard') }}" class="{{ (Request::is('dashboard')) ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ url('profile') }}" class="{{ (Request::is('profile')) ? 'active' : '' }}">Mijn profiel</a></li>
            <li><a href="{{ url('projects') }}" class="{{ (Request::is('projects')) ? 'active' : '' }}">Projecten overzicht</a></li>
            @if (Auth::user()->canCreateEditProject())
                <li>
                    <a href="{{ url('projects/create') }}" class="{{ (Request::is('projects/create')) ? 'active' : '' }}">Project toevoegen</a>
                </li>
            @endif
            <li><a href="{{ url('agenda') }}">Agenda</a></li>
            <li><a href="{{ Auth::user()->canCreateEditProject() ? route('projects.edit', $project->id) : route('projects.show', $project->id) }}" class="active">Project: {{ $project->name }}</a></li>
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
@endsection
