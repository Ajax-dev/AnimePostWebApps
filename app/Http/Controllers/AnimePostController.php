<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class AnimePostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animePosts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('animeposts.index', ['animeposts' => $animePosts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('animeposts.create');
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
            'name' => 'required|max:100',
            'genre' => '',
            'episodes' => 'required|numeric',
            'released' => 'required|date',
            'status' => 'required|max:30',
        ]);
        $a = new Post;
        $a->name = $validatedData['name'];
        $a->genre = $validatedData['genre'];
        $a->episodes = $validatedData['episodes'];
        $a->released = $validatedData['released'];
        $a->status = $validatedData['status'];
        $a->save();

        session()->flash('message', 'The Anime Post was created.');
        return redirect()->route('animeposts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $animepost = Post::findOrFail($id);
        return view('animeposts.show', ['animeposts' => $animepost]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
