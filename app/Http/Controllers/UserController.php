<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;
use app\Models\User;
use illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Data User',
            'data_user' => User::all(),
        );

        // return view('index',$data);
        return view('admin.master.user.list',$data);
    }

    public function store(Request $request)
    {
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        return redirest('/user')->with('success', 'Data Berhasil Disimpan');
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

        return redirest('/user')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $user=User::where('id', $id)->delete();
        return redirest('/user')->with('success', 'Data Berhasil Dihapus');
    }

}