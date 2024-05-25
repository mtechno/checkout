<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');


Route::post('/posts', function () {
    return Post::create([
        'title' => 'Post 1',
        'content' => 'Post 1 content',
        'image' => 'Post1.png',
        'likes' => 10,
        'is_published' => 1,
    ]);

});
//
Route::post('/posts', [PostController::class, 'store']);
Route::resource('posts', PostController::class);
