@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <head>
    </head>
    <body>
    <div class="card-header">
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('posts.update', ['id' => $post-> id]) }}">
            {{--@csrf adds security and middleware to html form --}}
            @csrf
            @method('PUT')
            <p> Image: <input type="file" name="name" id="image"
                              value="{{ old('image') }}"
                              width="48" height="48"></p>
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="genre" class="col-md-4 col-form-label text-md-right">{{ __('Genre') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('genre') is-invalid @enderror" name="genre" value="{{ old('genre') }}" required autocomplete="genre" autofocus>

                    @error('genre')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="episodes" class="col-md-4 col-form-label text-md-right">{{ __('Episodes') }}</label>

                <div class="col-md-6">
                    <input id="episodes" type="number" class="form-control @error('episodes') is-invalid @enderror" name="episodes" value="{{ old('episodes') }}" required autocomplete="episodes" autofocus>

                    @error('episodes')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="released" class="col-md-4 col-form-label text-md-right">{{ __('Released') }}</label>

                <div class="col-md-6">
                    <input id="released" type="number" class="form-control @error('released') is-invalid @enderror" name="released" value="{{ old('released') }}" required autocomplete="released" autofocus>

                    @error('released')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                <div class="col-md-6">
                    <input id="status" type="text" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ old('status') }}" required autocomplete="status" autofocus>

                    @error('status')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <input type="submit" value="Submit">
            <a href="{{ route('posts.index') }}" > Cancel </a>
        </form>
    </div>
    </body>
@endsection
