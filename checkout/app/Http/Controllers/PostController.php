<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Post::all();
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'body' => 'required',
                'likes' => 'required',
                'is_published' => 'required',
            ]
        );

        return Post::create($request->all());
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return Post::where('id','like','%'.$post->id.'%')->get();
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::find($id);
        $post->update($request->all());
        return $post;
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        return $post->destroy($post->id);
        //
    }
}
