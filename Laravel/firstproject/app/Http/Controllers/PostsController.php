<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function index() {
        $id = 2;

        // $posts = DB::table('posts') 
        //         ->where('created_at', '>', now()->subDay())
        //         ->orWhere('title', 'Mr.')
        //         ->get();
        //$posts = DB::table('posts') 
        //        ->whereBetween('id', [2,3]) // Scope a query to return only rows where a column is between 2 values
        //        ->get();

        // $posts = DB::table('posts') 
        //         ->whereNotNull('title') // Allows us to see if a column has a null/empty value
        //         ->get();

        // $posts = DB::table('posts') 
        //         ->select('title') //Selecting rows where the selected data is unique
        //         ->distinct()
        //         ->get();

        // $posts = DB::table('posts') 
        // ->orderBy('title', 'asc') // Returning the data according to the title in ascending order!
        // ->get();

        // $posts = DB::table('posts') 
        //         -> latest()//Sort our database based on a column ---> latest row according to the created_at column
        //         ->get();

        // $posts = DB::table('posts') 
        // -> oldest()//Sort our database based on a column ---> Oldest row according to the created_at column
        // ->get();

        // $posts = DB::table('posts') 
        //         ->inRandomOrder()//Sort our database based on a column ---> random order
        //         ->get();

        // $posts = DB::table('posts') 
        //         ->orderBy('created_at', 'desc')
        //         ->first(); // Gets us the first result in the database based on the criteria

        // $posts = DB::table('posts') 
        //         ->find($id); // Find the specific id in the database
        
        // $posts = DB::table('posts') 
        // ->where('id', $id)
        // ->count(); // Will count the number of matching results

        // $posts = DB::table('posts') 
        //         ->min('id'); // Returns the id with the smallest value ---> use max instead of min to return the largest value based on the criteria

        // $posts = DB::table('posts') 
        // ->sum('id'); // Calculates the total value of the id's

        // $posts = DB::table('posts') 
        // ->avg('id'); // Calculates the average value of the id's

        // $posts = DB::table('posts') 
        // ->insert([
        //     'title'=> 'New Title',
        //     'body' => 'New Body'
        // ]);  // Inserting Data into the database

        $posts = DB::table('posts')
        ->select('title')
        ->get(); // Show data based on the column we want to view

        // $posts = DB::table('posts') 
        // ->where('id', '=', 5)
        // ->update([
        //     'title'=> 'New Title As well',
        //     'body' => 'New Body As Well'
        // ]);  // Updating Data into the database

        // $posts = DB::table('posts') 
        // ->where('id', '=', 5)
        // ->delete();  // Deleting Data into the database
        
        dd($posts); // Is like the var_dump or print_r function in PHP
    }
}
