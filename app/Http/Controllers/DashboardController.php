<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Dashboard'
        );

        // return view('index', $data);
        return view('dashboard', $data);
        // return view('admin.master.user.list',$data);
    }
}
