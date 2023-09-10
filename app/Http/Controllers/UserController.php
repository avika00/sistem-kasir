<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\redirect;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
    //    dd('test');
        $data = array(
            'title'     => 'Data User',
            'data_user' => User::all(),
        );

        // return view('index',$data);
        return view('admin.master.user.list',$data);
    }

    public function profile()
    {
    //    dd('test');
        $user = Auth::user()->id;

        $data = array(
            'title'        => 'Data User',
            'data_profile' => User::where( 'id', $user)->get(),
        );

        // return view('index',$data);
        return view('profile',$data);
    }

    public function store(Request $request)
    {
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        return redirect('/user')->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        User::where('id', $id)
            ->where('id', $id)
                ->update([
                    'name'     => $request->name,
                    'email'    => $request->email,
                    'password' => Hash::make($request->password),
                    'role'     => $request->role,
        ]);

        return redirect('/user')->with('success', 'Data Berhasil Diubah');
    }

    public function updateprofile (Request $request, $id)
    {
        User::where('id', $id)
            ->where('id', $id)
                ->update([
                    'name'     => $request->name,
                    'email'    => $request->email,
                    'password' => Hash::make($request->password),
                    'role'     => $request->role,
        ]);

        return redirect('/profile')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $user=User::where('id', $id)->delete();
        return redirect('/user')->with('success', 'Data Berhasil Dihapus');
    }

}