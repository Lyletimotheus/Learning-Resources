<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\PostLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostLikeController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }

    // Creating a method to store that like 
    public function store(Post $post, Request $request) {
        // Preventing users to like the posts to many times
        if($post->likedBy($request->user())) {
            return response(null, 409); // Conflict http code
        }

        $post->likes()->create([
           'user_id' => $request->user()->id, 
        ]);

        if(!$post->likes()->onlyTrashed()->where('user_id', $request->user()->id)->count()) {
            Mail::to($post->user)->send(new PostLiked(auth()->user(), $post));
        }
        return back();
    }

    public function destroy(Post $post, Request $request) {
        $request->user()->likes()->where('post_id', $post->id)->delete();   

        return back();
    }

}


