<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('posts.index', ['posts' => $posts]);
    }

    public function apiIndex($id) {
        $posts = Post::find($id) -> comments;
        return $posts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request -> validate([
            'image' => 'image|max:2048',
            'name' => 'required|max:100',
            'genre' => '',
            'episodes' => 'required|numeric',
            'released' => 'required|numeric',
            'status' => 'required|max:30',
        ]);

//        dd(request()->all());
        $user_id = auth()->id();
        $image = new Image;
        $a = new Post;
        if ($request->file('image') && $user_id != null) {
            $imagePath = $request->file('image');
            $imageName = $imagePath->getClientOriginalName();

            $path = $request->file('image')->storeAs('userImages', $imageName, 'public');
            $image->name = $imageName;
            $image->url = '/storage/'.$path;
            $image->imageable_id = 10;
            $image->imageable_type = $imagePath->getClientMimeType();
//            dd($image);
            $image -> save();
        }
        $a->name = $validatedData['name'];
        $a->genre = $validatedData['genre'];
        $a->episodes = $validatedData['episodes'];
        $a->released = $validatedData['released'];
        $a->status = $validatedData['status'];
        $a->user_id = $user_id;
//        dd($image);


        $a->save();
        if($request->file('image')) {
            $a->image()->save($image);
        }
        session()->flash('message', 'The Anime Post was created.');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        session()->flash('message', 'The Anime Post was edited.');
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request -> validate([
            'image' => 'nullable|image',
            'name' => 'required|max:100',
            'genre' => '',
            'episodes' => 'required|numeric',
            'released' => 'required|numeric',
            'status' => 'required|max:30',
        ]);
        $post = Post::findOrFail($id);
        $post->name = $validatedData['name'];
        $post->genre = $validatedData['genre'];
        $post->episodes = $validatedData['episodes'];
        $post->released = $validatedData['released'];
        $post->status = $validatedData['status'];
        $post->user_id = auth()->id();
        $post->save();

        session()->flash('message', 'The Anime Post was edited.');
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
