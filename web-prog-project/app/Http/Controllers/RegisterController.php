<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function open()
    {
        return view('register', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
    $validatedData = $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:20'
        ]);

    $validatedData['password'] = bcrypt($validatedData['password']);

    User::create($validatedData);
    return redirect('/login')->with('success', 'Your account successfully registered!');
    }
}
