@extends('layouts.app')

@section('title', 'Create New Comment')

@section('content')
    <head>
    </head>
    <body>
    <div class="card-header">
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('comments.update', ['id' => $comment-> id]) }}">
            {{--@csrf adds security and middleware to html form --}}
            @csrf
            @method('PUT')
            <p> Content:  <input type="text" name="content"
                                 value="{{ old('content') }}"></p>
            <input type="submit" value="Submit">
            <a href="{{ route('posts.index') }}" > Cancel </a>
        </form>
    </div>
    </body>
@endsection
