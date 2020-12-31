@extends('layouts.app')

@section('title', 'Anime Posts')

@section('content')

    <html>
        <head>

        </head>
        <body>
        <div class="page-header">{{__('Anime Posts Listing')}}</div>

            <div class="card-body">
                <div class="card-header"> These are the anime posts: </div>
                <div class="ul">
                    @foreach ($posts as $post)
                        <div class="li-v">
                            <a href="{{ route('posts.show', ['id' => $post -> id]) }}">
                                {{ $post -> name }}</a>
                        </div>
                        @if(Auth::user())
                            @if ($post->user->id == Auth::user()->id)
                                <a href="{{ route('posts.edit', ['id' => $post->id]) }}" > Edit Post </a>
                            @endif
                        @endif
                    @endforeach
                </div>

                <br>
                <a href="{{ route('posts.create') }}"> Create Post</a>
                <br>
                <div class="card-subtitle2"> Pages: </div>
                <div class="card-footer">
                    <div class="container">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </body>
    </html>
@endsection
