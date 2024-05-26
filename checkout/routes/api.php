<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


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
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);
//Route::resource('posts', PostController::class);
Route::post('/register',[AuthController::class,'register']);


//Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/posts', [PostController::class, 'store']);
    Route::put('/posts/{id}', [PostController::class, 'update']);
    Route::delete('/posts/{id}', [PostController::class, 'destroy']);
    Route::post('/logout',[AuthController::class,'logout']);
});
