<?php

use App\Models\Post;
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

Route::get('/', function () {
    return view('posts');
});

Route::get('posts/{post}', function($slug) {
    # Explain our logic
    // Find a post by its slug and pass it to a view called "post"
    // 1. Return a view called post
    // 2. Pass each individual post into the $post variable
    // 3. Create a Post class to find the slug and pass it into the view

    return view('post', [
        'post' => Post::find($slug)
    ]);

})-> where('post','[A-z_\-]+');