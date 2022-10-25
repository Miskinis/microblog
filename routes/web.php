<?php

use App\Http\Livewire\Blog;
use App\Http\Livewire\Posts\PostComponent;
use App\Http\Livewire\Posts\PostCrud;
use App\Http\Livewire\Posts\UserPosts;
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

Route::get('/', Blog::class)->name('home');
Route::get('/post/{post}', PostComponent::class)->name('post');
Route::get('/user/{user}', UserPosts::class)->name('user');
