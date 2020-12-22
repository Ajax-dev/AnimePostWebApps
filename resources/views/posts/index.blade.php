@extends('layouts.app')

@section('title', 'Anime Posts')

@section('content')
    <head>

    </head>
    <body>
    <div class="card-header">{{__('Anime Posts')}}</div>

    <div class="card-body">
            <div class="card-subtitle"> These are the anime posts: </div>
            <div class="ul">
                @foreach ($posts as $post)
                    <div class="li-v">
                        <a href="{{ route('posts.show', ['id' => $post -> id]) }}">
                            {{ $post -> name }}</a>
                    </div>
                @endforeach
            </div>

            <br>
            <a href="{{ route('posts.create') }}"> Create Post</a>
            <br>
            <div class="card-subtitle2"> Pages: </div>
            <div class="container">
                {{ $posts->links() }}
            </div>
        </div>
    </body>
@endsection
