@extends('layouts.app')

@section('title', 'Anime Posts')

@section('content')

    <html>
        <head>

        </head>
        <body>
        <div class="page-header">{{__('Anime Posts Listing')}}</div>

            <div class="card-body" style="justify-content: center">
                <div class="card-header"> These are the anime posts: </div>
                <div class="ul">
                    <ul>
                    @foreach ($posts as $post)
                        <div class="li-v">
                            <a href="{{ route('posts.show', ['id' => $post -> id]) }}">
                                {{ $post -> name }}</a>

                        @if(Auth::user())
                            @if ($post->user->id == Auth::user()->id || auth() -> user() -> roles() -> firstWhere('role','Admin'))
                                <a href="{{ route('posts.edit', ['id' => $post->id]) }}" style="color: green" ><i> Edit Post</i> </a>
                            @endif
                        @endif
                        </div>
                        <br>
                    @endforeach

                    </ul>
                </div>

                <br>
                <a href="{{ route('posts.create') }}"> Create Post</a>
                <br>
                <div class="card-subtitle2"> Pages: </div>
                <div class="card-footer" style="justify-content: flex-end">
                    <div class="container">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </body>
    </html>
@endsection
