<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

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
//        dd(auth()->user());
        $request->validate(
            [
                'title' => 'required',
                'body' => 'required',
                'user_id' => 'required',
            ]
        );
//        dd($request->all());
        return Post::create($request->all());
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::where('id', $id)->get();
        $comments = Post::all()->comments();
        return [$post];
//        return Post::where('id', 'like', '%' . $id . '%')->get();

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
    public function destroy($id)
    {
        $post = Post::find($id);
        return $post->destroy($post->id);
        //
    }
}
