@include('layouts.app')

<body>
<div class="content">

    <button class="btn btn-secondary" onclick="location.href='{{ url('projects/'.$project->id.'/edit') }}'">
        Terug naar project
    </button>
    <br><br>
    <h3>Personen overzicht</h3><br>
    <table class="projects">
        <tr>
            <th>Rol</th>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>E-mailadres</th>
            @if (Auth::user()->role() == 'Opdrachtgever')
                <th></th>
            @endif
        </tr>
        @foreach($project->users() as $user)
            <tr>
                <td>{{$user->role() }}</td>
                <td>{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->email}}</td>
                @if (Auth::user()->role() == 'Opdrachtgever' && Auth::user()->id != $user->id)
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
</div>
</body>
