@extends('layouts.app')

@section('content')
    <h3>Beoordeling overzicht</h3><br>
    <table class="projects">
        <tr>
            <th>Rol</th>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>Cijfer</th>
            <th>Opmerkingen</th>
            <th>Afbeelding</th>
        </tr>
        @foreach($ratings as $rating)
            <tr>
                <td>{{$rating->user()->role() }}</td>
                <td>{{$rating->user()->first_name}}</td>
                <td>{{$rating->user()->last_name}}</td>
                <td>{{$rating->mark}}</td>
                <td>{{$rating->comments}}</td>
                <td><img src="{{ Storage::url('app/images/ratings/'.$rating->image_path)}}"></td>
                console.log({{$rating}})
            </tr>
        @endforeach
    </table>
@endsection
