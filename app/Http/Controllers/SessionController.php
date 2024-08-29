<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    function create()
    {
        return view('auth.login');
    }

    function store(Request $request)
    {
        $data = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($data)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }

        request()->session()->regenerate();

        return redirect('/jobs');
    }

    function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
