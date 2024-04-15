@extends('layouts.app');

@section('content')

    <div class="container">
        <h1>Films</h1>
        <ul class="list-group">
            @foreach($films as $film)
                <li class="list-group-item">
                    <a href="{{ route('$films.show', $film->id ) }}">
                        {{  $film->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
