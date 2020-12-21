
<link type="text/css" rel="stylesheet" href="{{ URL::asset('main.css')}}">
@extends('layouts.app')

@section('title', 'Anime Posts')

@section('content')
    <head>

    </head>
    <body>
    <div class="card-header">

    </div>
    Anime Posts
    <div class="card-body">
        Anime Posts
        <p> These are anime posts: </p>
        <ul>
            @foreach ($animeposts as $post)
                <li>
                    <a href="{{ route('animeposts.show', ['id' => $post -> id]) }}">
                        {{ $post -> name }}</a>
                </li>
            @endforeach
        </ul>

        <a href="{{ route('animeposts.create') }}"> Create Post</a>
        {{ $animeposts->links() }}
    </div>
    </body>
@endsection
