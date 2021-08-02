<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB; // When you want to write raw SQL statements include this file

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
     * Create a new controller instance.
     * The user needs to be authenticated to access the create and edit URI's, but we add exceptions on in the form of an array to allow for certain views to be accessible
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

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
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

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
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
           'title' => 'required',
           'body' => 'required',
           'cover_image' => 'image|nullable|max:1999'
       ]);

       // Handle file uploads
       if($request->hasFile('cover_image')) { 
        //Get filename with the extenstion
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //Get just extension
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore = $filename. '_'.time(). '.'.$extension;
        //Upload the image
        $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
       }else{
           $fileNameToStore = 'noimage.jpg';
       }
       
       // Create a new post using Tinker
       $post = new Post;
       $post->title = $request->input('title');
       $post->body = $request->input('body');
       $post->user_id = auth()->user()->id; // This will get the current authorized user id 
       $post->cover_image = $fileNameToStore;
       $post->save();

       // Redirect the user with a success message we created in the messages.blade.php 
       return redirect('/posts')->with('success', 'Your post has been successfully created!');
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
        $post=Post::find($id);
        //Check for correct user
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        return view('posts.edit')->with('post', $post);
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        
        // Handle file uploads
       if($request->hasFile('cover_image')) { 
        //Get filename with the extenstion
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //Get just extension
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore = $filename. '_'.time(). '.'.$extension;
        //Upload the image
        $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
       }

        // Create a new post using Tinker
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')) { 
            $post->cover_image = $fileNameToStore;
        }
        $post->save();
 
        // Redirect the user with a success message we created in the messages.blade.php 
        return redirect('/posts')->with('success', 'Your post has been successfully updated!');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        //Check for correct user
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        if($post->cover_image != 'noimage.jpg') {
            //Delete Image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        
        $post->delete();
        return redirect('/posts')->with('success', 'Your post has been successfully removed!');

    }
}
