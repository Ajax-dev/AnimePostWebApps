@extends('layouts.app')

@section('title', 'Anime Post Details')

@section('content')
    <head>
    </head>
    <body>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <div class="page-header">
        Anime Post
    </div>
    <div class="card-body" style="justify-content: flex-start">
        <ul>
            <li>
                @isset( $post -> image)
                    <img src="{{ $post -> image -> url }}" alt="Image from user {{ $post -> user -> name }}" height="auto" width="400">
                @else
                    <div class="no-img">
                        This user has not posted an image
                    </div>
                @endisset
            </li>
            <br>
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
            <div id ="root">
                <li>
                @foreach ($post -> comments as $comment)
                    <p> {{ $comment-> content }}
{{--                    Check if user is logged in before allowing edit--}}
                    @if(Auth::user())
                        @if ($comment->user->id == Auth::user()->id)
                            <a href="{{ route('comments.edit', ['id' => $comment->id]) }}" > Edit Comment </a>
                        @endif
                    @endif
                        <br>
                        <i>
                         Posted by: {{ $comment->user-> name }}
                        </i>
                    </p>
                    <br>
                @endforeach
                 </li>
                @csrf
                @if( Auth::user())
                    <p>New Comment:
                        <input type="text" id="input" v-model="newComment">
                    </p>
                    <button @click="addComment" onClick="window.location.reload();">Submit</button>
                @else
                    <p style="color:red">Login to post a comment!</p>
                @endif
            </div>
            <li>
        <script>
            var app = new Vue({
                el: "#root",
                data: {
                    comments: [],
                    newComment: '',
                },
                mounted() {
                    axios.get("{{ route('api.comments.index', ['id' => $post -> id]) }}")
                    .then( response => {
                        // handling success
                        this.comments = response.data;
                    })
                    .catch( response => {
                        // handle failure
                        console.log(response.data);
                    })
                },
                methods : {
                    addComment: function() {
                        axios.post("{{ route('api.comments.store', ['post_id' => $post -> id,'user_id' => Auth::user() ? id : 0]) }}", {
                            content: this.newComment,
                        })
                        .then(response => {
                            console.log("RESP::::" , response);
                            // handle success
                            this.comments.push(response.data);
                            this.newComment = '';

                        })
                        .catch( error => {
                            console.log("ERRRR:: ",error.response);
                        })
                    },
                },
            });


        </script>
        <a href="{{ route('posts.index') }}" > Home </a>
        </div>
    </body>
@endsection
