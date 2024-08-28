<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    function create()
    {
        return view('auth.register');
    }

    function store(Request $request)
    {
    }
}
