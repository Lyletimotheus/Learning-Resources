<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index() {
        $title = "Welcome to my laravel 8 project!";
        $description = "Created by John Doe";

        $data = [
            'productOne' => 'iphone',
            'productTwo' => 'Samsung'
        ];

        return view('products.index', [
            'data' => $data
        ]);
    }

    public function about() {
        return "About us page!";
    }

    // public function show($id) {
    //     return $id;
    // }

    public function show($name) {
        $data = [
            'iphone' => 'iPhone',
            'samsung' => 'Samsung'
        ];

        return view('products.index', [
            'products' => $data[$name] ?? 'Product ' .$name . '  does not exist'
        ]);
    }
}


/*
*******************************
Returning Views To the Page
*******************************
class ProductsController extends Controller
{
    public function index() {
        $title = "Welcome to my laravel 8 project!";
        $description = "Created by John Doe";

        $data = [
            'productOne' => 'iphone',
            'productTwo' => 'Samsung'
        ];

    // This is the compact method of including views below.
        // return view('products.index', compact('title', 'description'));

    // This is the with method when returning a view
        // return view('products.index')->with('title', $title);
        // return view('products.index')->with('data', $data);

    // Pass it directly in the view
            return view('products.index', [
                'data' => $data
            ]);


    }

    public function about() {
        return "About us page!";
    }
}

******************************      END     ******************************************

*/