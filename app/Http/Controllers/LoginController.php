<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function index()
    {
        // dd(session()->all());
        return view('login.index', [
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

        $credentials= ['email'=>$request->email, 'password'=>$request->password];
        
        if(Auth::attempt($credentials)) {
            // return redirect()->intended()->route('dashboard');
            // return redirect()->route('/dashboard');
            return redirect('/dashboard/$data')->with('success', 'Login Success');

        }

        return back()->with('loginError', 'Login failed!');
        // dd('berhasil login');
    }
}
