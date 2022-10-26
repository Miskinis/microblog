<?php

use App\Http\Livewire\Posts\CreatePost;
use App\Http\Livewire\Posts\Posts;
use App\Http\Livewire\Posts\PostCrud;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/', Posts::class)->name('home');
Route::get('/post/{post}', Posts::class)->name('post');
Route::get('/user/{user}', Posts::class)->name('user');
Route::get('/crud/post', CreatePost::class)->name('post.create');
Route::get('/crud/post/{post}', CreatePost::class)->name('post.edit');
