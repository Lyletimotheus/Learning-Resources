<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
            'email'=> 'required|max:255',
            'password'=> 'required|confirmed',            
        ]); 

        dd('User stored');
       //store the user
       // sign the user in
       // redirect
    }
}
