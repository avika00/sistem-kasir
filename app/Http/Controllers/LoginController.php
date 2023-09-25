<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\UserController;
use App\Models\User;

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
            'email'    => 'required|email:dns',
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

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout Success');
    }

    public function register(){
        return view('register');
    }

    public function register_proses(Request $request){
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email:dns',
            'password' => 'required'
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        $login= ['email'=>$request->email, 'password'=>$request->password];
        
        if(Auth::attempt($login)) {
            return redirect('/dashboard/$data')->with('success', 'Login Success');
        }
        return back()->with('loginError', 'Login failed!');
    }
}
