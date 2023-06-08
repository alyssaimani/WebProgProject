<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function open(Request $request)
    {
        $email = session(["email" => $request->email]);
        return view('login', [
            'title' => 'Login',
            'email' => $email
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8|max:20'
        ]);

        if ($request->remember) {
            Cookie::queue(Cookie::make('remember', true, 120));
            Cookie::queue(Cookie::make('email', $request->email, 120));
            Cookie::queue(Cookie::make('password', $request->password, 120));
        } else {
            Cookie::queue(Cookie::forget('remember'));
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return redirect('/login')->with('error', 'Invalid Credential');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
