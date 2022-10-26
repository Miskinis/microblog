<?php

use App\Http\Resources\CommentCollection;
use App\Http\Resources\PostCollection;
use App\Http\Resources\CommentResource;
use App\Http\Resources\PostResource;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group( function() {

    Route::get('posts', function () {
        return new PostCollection(Post::with(['user', 'topic', 'comments'])->where('is_public', true)->get());
    });

    Route::get('posts/{post}', function ($post) {
        return new PostResource(Post::with(['user', 'topic', 'comments'])->find($post));
    });

    Route::get('comments', function () {
        return new CommentCollection(Comment::all());
    });

    Route::get('comments/{comment}', function ($comment) {
        return new CommentResource(Comment::with(['user', 'post'])->find($comment));
    });

    Route::get('users/posts/{user}', function ($user) {
        return new PostCollection(User::with(['comments', 'posts'])->find($user)->posts()->where('is_public', true)->get());
    });

    Route::get('users/comments/{user}', function ($user) {
        return new CommentCollection(User::with(['posts', 'comments'])->find($user)->comments);
    });
});
