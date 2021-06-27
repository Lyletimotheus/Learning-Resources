<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {        
        return view('auth.register');
    }

    public function store(Request $request) {
       // validation
        $this->validate($request, [
            'name'=> 'required|max:255',
            'username'=> 'required|alpha_num',
            'email'=> 'required|email|max:255',
            'password'=> 'required|confirmed',            
        ]); 

       //store the user
       User::create([
           'name'=> $request->name,
           'username'=> $request->username,
           'email'=> $request->email,
           'password'=> Hash::make($request->password),
       ]);

       // sign the user in (There are multiple ways to accomplish this.)
       // 1. Using the auth helper function
        //    auth()->attempt([
        //        'email'=> $request->email,
        //        'password'=> $request->password,
        //    ]);

        // 2. Using the auth helper function but we don't have to define the array
       auth()->attempt($request->only('email', 'password'));

       // Redirect the user to the correct page if they pass authentication
       return redirect()->route('dashboard');

       // redirect
    }
}
