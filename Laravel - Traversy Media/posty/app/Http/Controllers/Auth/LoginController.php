<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function store(Request $request) {
        // This method is responsible for signing the user in
        $this->validate($request, [
            'email'=> 'required|email',
            'password'=> 'required',            
        ]); 

        //Creating a error message if this fails / If the user is not successfully authenticated 

        if(!auth()->attempt($request->only('email', 'password'))) {
           return back()->with('status', 'Invalid login details'); 
        }

        return redirect()->route('dashboard');

    }
}
