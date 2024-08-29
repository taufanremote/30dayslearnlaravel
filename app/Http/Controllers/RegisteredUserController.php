<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;

class RegisteredUserController extends Controller
{
    function create()
    {
        return view('auth.register');
    }

    function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', Password::min(6)],
        ]);

        $user = User::create($data);

        Auth::login($user);

        return redirect('/jobs');
    }
}
