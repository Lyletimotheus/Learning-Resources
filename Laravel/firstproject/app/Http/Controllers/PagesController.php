<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        return view('index');
    }

    public function about() {
        $name = "Lyles";
        $names = ['Jack', 'John', 'David'];
        return view('about', [
            'names' => $names
        ]);
    }
}
