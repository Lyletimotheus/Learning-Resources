<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy']); // This middleware only applies to store and destroy methods
    }
    public function index() {
        //$posts = Post::get(); // Return all data in the database in order - returns it as a collection in Laravel
        $posts = Post::orderBy('created_at','desc')->with(['user', 'likes'])->paginate(20); // Pagination: takes one argument - number of items we want to display per page

        return view('posts.index', [
            'posts' => $posts // Passing down the post to our index views so that we can iterate over each post
        ]);
    }

    public function show(Post $post) {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $request->user()->posts()->create([ //Creating a record in the database
            'body' => $request->body
        ]);
        
        return back();
    }

    public function destroy(Post $post) {
        $this->authorize('delete', $post);  // Throws an exception and shows the error 403 view to users that want to delete other users posts
        $post->delete();

        return back();
    }
}
