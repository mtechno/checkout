<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);

Route::post('/register', [AuthController::class, 'register']);


//Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/posts', [PostController::class, 'store']);
    Route::put('/posts/{id}', [PostController::class, 'update']);
    Route::delete('/posts/{id}', [PostController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::resource('comments', CommentController::class);
});


//Route::resource('posts', PostController::class);
//Route::post('/posts', function () {
//    return Post::create([
//        'title' => 'Post 1',
//        'content' => 'Post 1 content',
//        'image' => 'Post1.png',
//        'likes' => 10,
//        'is_published' => 1,
//    ]);
//
//});
//
