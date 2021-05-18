<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

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

 Route::get('/',[PagesController::class, 'index']);
 Route::get('/about', [PagesController::class, 'about']);


  
 






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

*****************************
Ways to do routing

*****************************
// Laravel 8 (New Way)
 Route::get('/products', [ProductsController::class, 'index']);
 Route::get('/products/about', [ProductsController::class, 'about']);

//Laravel 8 (Also New Way)
Route::get('/products', 'App\Http\Controllers\ProductsController@index' );

// Before Laravel 8
Route::get('/products', 'ProductsController@index');

*************************************       END         ***********************************

******************************
Routing Parameters
******************************
// Route::get('/products/{name}', [ProductsController::class, 'show']);
// /products = all products
// /products/productName
// /products/productId
// Here we are saying that whenever the person enters a integer after products/ the web.php with the function show will return that specified id to the page

 // 1. Pattern is an integer
//  Route::get('/products/{id}', 
//  [ProductsController::class, 'show'])->where('id', '[0-9]+');
// Here we are only looking to pass integer variables with values of 0 or 9. The plus indicates that they can be double digits and not just single digits.

//2. Pattern is an string
  Route::get('/products/{name}', 
  [ProductsController::class, 'show'])->where('name', '[a-zA-Z]+'); 
// Here we are only to pass string variables into the URL which are a-z and A-Z.


//3. Passing in multiple parameters 
    Route::get('/products/{name}/{id}', 
    [ProductsController::class, 'show'])->where([
        'name' => '[a-z]+',
        'id' => '[0-9]+'
    ]); 

    *********************************************           END             ******************************************************
    

    **********************
    Named Routes
    *********************
     Route::get('/', [PagesController::class, 'index']) -> name('products');
                                                            ----------------
    *********************************************           END             ***********************************************
    */