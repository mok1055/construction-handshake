@include('layouts.app')

<body>
<div class="content">
    <button class="btn btn-secondary" onclick="location.href='{{ url('dashboard') }}'">
        Terug naar dashboard
    </button>
    <br><br>
    <h3>Project toevoegen</h3><br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('projects.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Project naam:</label>
            <input type="text" class="form-control" name="name"/>
        </div>

        <div class="form-group">
            <label for="description">Project beschrijving:</label>
            <textarea class="form-control" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="description">Project type:</label><br>
            <select class="browser-default custom-select dropdown-primary" name="type">
                @foreach($types as $type)
                    <option value="{{ $type->name }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="description">Begindatum:</label><br>
            <input type="date" name="start_date">
        </div>
        <br>
        <div class="form-group">
            <label for="description">Einddatum:</label><br>
            <input type="date" name="end_date">
        </div>
        <br><br>
        <div class="form-group">
            <button class="btn btn-success">Project toevoegen</button>
            <br><br>
        </div>
    </form>
    </form>
</div>
</body>
