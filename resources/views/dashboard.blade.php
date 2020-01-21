@extends('layouts.app')

@section('content')
    <div class="planning">
        <div></div>
        <h2>Projecten</h2><br>
        @if (Auth::user()->canCreateEditProject())
            <button onclick="location.href='{{ route('projects.create') }}'" type="button" class="btn btn-success">
                Project toevoegen
            </button>
            <br><br>
        @endif
        <table class="projects">
            <tr>
                <th>Naam</th>
                <th>Rol</th>
                <th>Beschrijving</th>
                <th>Status</th>
                <th>Start datum</th>
                <th>Eind datum</th>
                <th></th>
            </tr>
            @foreach($projects as $project)
                <tr>
                    <td>{{$project->name}}</td>
                    <td>{{ Auth::user()->role() }}</td>
                    <td>{{$project->description}}</td>
                    <td>{{$project->status()->name}}</td>
                    <td>{{$project->start_date->format('d-m-Y')}}</td>
                    <td>{{$project->end_date->format('d-m-Y')}}</td>
                    @if (Auth::user()->canCreateEditProject())
                        <td>
                            <button onclick="location.href='{{ route('projects.edit', $project->id) }}'">
                                Wijzigen
                            </button>
                            <br><br>
                        </td>
                    @else
                        <td>
                            <button onclick="location.href='{{ route('projects.show', $project->id) }}'">
                                Weergeven
                            </button>
                            <br><br>
                        </td>
                    @endif
                </tr>
            @endforeach
        </table>
    </div>
    @component('layouts.components.agenda')
    @endcomponent
@endsection
