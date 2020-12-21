<link type="text/css" rel="stylesheet" href="{{ URL::asset('main.css')}}">
@extends('layouts.app')

@section('title', 'Anime Post Details')

@section('content')
    <head>
    </head>
    <body>
    <div class="card-header">
        Anime Post
    </div>

    <div class="card-body">
        <ul>
            <li> Name: {{ $post-> name }} </li>
            <li> Genre: {{ $post-> genre }} </li>
            <li> Episodes: {{ $post-> episodes}} </li>
            <li> Released: {{ $post-> released }} </li>
            <li> Status: {{ $post-> status }} </li>
        </ul>
        <li> Comments:
            @foreach ($post->comments as $comment)
                <p> Posted by: {{ $comment->user-> name }} </p>
                <p> {{ $comment-> content }} </p>
                @if ($comment->user-> id == Auth::user()->id)
                    <a href="{{ route('comment.edit', ['id' => $comment->id]) }}" > Edit Comment </a>
                @endif
            @endforeach
        </li>
        <div>
            <form method="POST" action="{{ route('comment.store') }}">
                @csrf
                <p> New Comment: <input type="text" name="content"
                                        value="{{ old('content') }}"></p>
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <input type="submit" value="Submit">
            </form>
            <a href="{{ route('animeposts.index') }}" > Back </a>
        </div>
    </div>
    </body>
@endsection
