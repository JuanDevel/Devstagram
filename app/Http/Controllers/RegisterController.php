<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function sign_up() 
    {
        return view('auth.register');
    }
}
