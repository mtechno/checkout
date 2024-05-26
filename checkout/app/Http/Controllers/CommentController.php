<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePostRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'body'=>'required',
        ]);

        $input = $request->all();
        $input['user_id'] = auth()->user()->id;

        Comment::create($input);

        return back();
    }

    public function index(Post $post)
    {
        return Comment::all();
        //
    }

    public function show(Comment $comment)
    {
        return Comment::where('id','like','%'.$comment->id.'%')->get();
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
