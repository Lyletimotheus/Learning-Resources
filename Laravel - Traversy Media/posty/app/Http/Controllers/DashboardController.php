<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        //dd(auth()->user());  Here we check if the user is legit using the user object 
        return view ('dashboard');
    }
}
