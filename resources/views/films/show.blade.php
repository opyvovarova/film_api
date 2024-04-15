@extends('layouts.app');

@section('content')
    <div class="container">
        <h1>{{ $film->name  }}</h1>
        <h2>Actors:</h2>
        <ul>
            @foreach($film->actors as $actor)
                <li>{{ $actor->name  }}</li>
            @endforeach
        </ul>
    </div>
@endsection
