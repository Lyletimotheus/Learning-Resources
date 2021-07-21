<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // When you want to write raw SQL statements include this file

// The following resource methods need to be used
    // index() -> show list of posts
    // create() -> create a post
    // store() -> will submit the post to the DB
    // edit() -> will edit the post
    // update() -> the edit function will submit to this function
    // show() -> show one post
    // destroy() -> destroy the post

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Use plain SQL to fetch all the post
        // $posts = DB::select('SELECT * FROM posts');

        // Fetch all the post in the DB
        // $posts = Post::all();

        // Return a single post using the where clause
        // return Post::where('title', 'Post Two')->get();

        // Here we return only one post
        // $posts = Post::orderBy('title', 'desc')->take(1)->get();
    
        // Fetch post according to the title
        // $posts = Post::orderBy('title', 'desc')->get();

        // Paginate Results
        $posts = Post::orderBy('title', 'desc')->paginate(1);

        // 1. Return a view
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Here we need to show the individual post
        $post=Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
