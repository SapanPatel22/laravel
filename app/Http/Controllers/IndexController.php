<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
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
        // dd(request()->all());
        $messages = [
            'email.required' => 'Email is required!!!',
            'pass.required' => 'Password is required!!!',
        ];
        $rules = [
            'email' => 'required|email',
            'pass' => 'required|min:6|max:15'
        ];
        $this->validate($request, $rules, $messages);
    }
}
