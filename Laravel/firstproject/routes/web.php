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

// Route that sends back a view
Route::get('/', function () {
    return view('home');
});






/* 
*****************************
*                           *
* Routing Explained Below   *
*                           *
*****************************

firstproject.com == / ------------> if we want to get to the root of the domain
firstproject.com/users == /users  ----------> if we want to pass to the users page using a GET method


# Route that sends back a view
Route::get('/', function () {
    return view('welcome');
});

# Route to users - string
Route::get('/users', function (){
    return "Welcome to the users page!";
});

# Route to users - Array(JSON Response)
 Route::get('/users', function() {
     return ['PHP', 'HTML', 'Laravel'];
 });

# Route to users as a - json object (Sending a json object to the browser)
 Route::get('/users', function() {
     return response()-> json([
         'name' => 'Lyle',
         'course' => 'Laravel Intro'
     ]);
 });

# Route to users - function 
 Route::get('/users', function() {
     return redirect('/');
 });

 ************************************       END         ***********************************
 */