<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;

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
-------------------------
|Adding a dynamic route
-------------------------
Route::get('/users/{id}/{name}', function($id, $name) {
    return 'This is user '. $name . ' with id '.$id;
});
*/

Route::get('/', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/services', [PagesController::class, 'services']);

// Adding all the controllers as resources 
Route::resource('posts', PostsController::class);




Auth::routes();
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
