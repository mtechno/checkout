<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request)
    {
        $request->validate([
            'body' => 'required',
            'likes' => 'required',
        ]);

        $input = $request->all();
        $input['user_id'] = auth()->user()->id;

        return Comment::create($input);
        //        return Comment::create($request->all());
    }


    public function index(Post $post)
    {
        return Comment::all();
        //
    }

    public function show($id)
    {
        return Comment::where('id', 'like', '%' . $id . '%')->get();
        //
    }

    public function update(UpdatePostRequest $request, $id)
    {
        $comment = Comment::find($id);
        $comment->update($request->all());
        return $comment;
        //
    }

    public function destroy(Comment $comment)
    {
        return $comment->destroy($comment->id);
        //
    }

    public function search($likes) //search by likes
    {
        return Comment::find($likes)->get();
        //
//        return Comment::where('likes','like','%'.$comment->likes.'%')->get();
    }
    //
}
