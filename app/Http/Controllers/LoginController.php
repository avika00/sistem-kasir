<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index' [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        dd('berhasil login')
    }
}
