@extends('layouts.app')

@section('title', 'Create Anime Post')

@section('content')
    <head>
    </head>
    <body>
    <div class="card-header">
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <p> Image: <input type="file" name="name" id="image"
                              value="{{ old('image') }}"
                              width="48" height="48"></p>
            <p> Name: <input type="text" name="name"
                             value="{{ old('name') }}"></p>
            <p> Genre:  <input type="text" name="genre"
                                 value="{{ old('genre') }}"></p>
            <p> Episodes:  <input type="text" name="episodes"
                             value="{{ old('episodes') }}"></p>
            <p> Released:  <input type="text" name="released"
                             value="{{ old('released') }}"></p>
            <p> Status:  <input type="text" name="status"
                                   value="{{ old('status') }}"></p>
            <input type="submit" value="Submit">
            <a href="{{ route('posts.index') }}" > Cancel </a>
        </form>
    </div>
    </body>
@endsection
