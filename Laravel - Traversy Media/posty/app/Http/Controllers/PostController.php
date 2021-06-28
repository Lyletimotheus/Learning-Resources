<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        //$posts = Post::get(); // Return all data in the database in order - returns it as a collection in Laravel
        $posts = Post::paginate(20); // Pagination: takes one argument - number of items we want to display per page

        return view('posts.index', [
            'posts' => $posts // Passing down the post to our index views so that we can iterate over each post
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
}
