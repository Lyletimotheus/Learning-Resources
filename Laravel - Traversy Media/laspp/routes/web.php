<?php

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


/* 
Get Method followed by the URL and a function referencing the View
Route::get('/hello', function () {
    // return view('welcome');
    return "<h1>Hello World</h1>"; // You can embed HTML into here as well
});

// Adding dynamic values into the URL
Route::get('/users/{id}/{name}', function($id, $name) {
    return 'This is user:' .$name. 'with an id of: ' .$id;
});
*/

Route::get('/', 'App\Http\Controllers\PagesController@index');

Route::get('/about', function() {
    return view('pages.about');
});

