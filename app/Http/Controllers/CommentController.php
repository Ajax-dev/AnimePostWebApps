<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware('auth', ['except' => 'store']);
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
            'content' => 'required|max:255',
            'post_id' => 'required',
        ]);
        $posts = Post::findOrFail($request->post_id);
        $a = new Comment;
        $a->content = $validatedData['content'];
        $a->post_id = $validatedData['post_id'];
        $a->user_id = auth()->id();
        $a->save();

        session()->flash('message', 'Comment was successfully created!');
        return redirect()->route('animeposts.show', $posts->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usercomment = Comment::findOrFail($id);

        return view('comments.edit')->with('comment', $usercomment);
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
            'content' => 'required|max:255'
        ]);
        $usercomment = Comment::findOrFail($id);
        $usercomment->content = $validatedData['content'];
        $usercomment->save();

        return redirect()->route('animeposts.show', $usercomment->post_id);
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
