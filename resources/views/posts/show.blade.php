@extends('layouts.app')

@section('title', 'Anime Post Details')

@section('content')
    <head>
    </head>
    <body>
    <div class="page-header">
        Anime Post
    </div>

    <div class="card-body">
        <ul>
            <li> Name: {{ $post-> name }} </li>
            <li> Genre: {{ $post-> genre }} </li>
            <li> Episodes: {{ $post-> episodes}} </li>
            <li> Released: {{ $post-> released }} </li>
            <li> Status: {{ $post -> status }} </li>
            <br>
            <li> Tags:
                @foreach($post -> tags as $tag)
                        {{ $tag -> tags }}
                @endforeach
            </li>
            <br> Posted by: {{ $post -> user -> name }} (Role:
            @foreach($post -> user -> roles as $role)
                {{ $role -> role }}
            @endforeach
            )
        </ul>
        <div class="card-subtitle2"> Comments: </div>
            <li>
            @foreach ($post->comments as $comment)
                <p> Posted by: {{ $comment->user-> name }}
                    (Role:
                    @foreach($post -> user -> roles as $role)
                        {{ $role -> role }}
                    @endforeach
                    )</p>
                <p> {{ $comment-> content }} </p>
            {{-- Check if user is logged in before allowing edit --}}
                @if(Auth::user())
                    @if ($comment->user->id == Auth::user()->id)
                        <a href="{{ route('comments.edit', ['id' => $comment->id]) }}" > Edit Comment </a>
                    @endif
                @endif
            @endforeach
        </li>
        <div>
            <form method="POST" action="{{ route('comments.store') }}">
                @csrf
                <p> New Comment: <input type="text" name="content"
                                        value="{{ old('content') }}"></p>
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <input type="submit" value="Submit">
            </form>
            <a href="{{ route('posts.index') }}" > Back </a>
        </div>
    </div>
    </body>
@endsection
