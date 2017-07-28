<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignupController extends Controller
{
     public function index()
    {
        return view('signup.signup');
    }

    public function show()
    {
        return('');
    }

    public function create()
    {
        return('');
    }

    public function store(Request $request)
    {
       
    }
}
