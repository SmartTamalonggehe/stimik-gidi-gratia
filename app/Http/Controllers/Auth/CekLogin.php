<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CekLogin extends Controller
{
    public function index()
    {
        if (auth()->user()->roles->first()) {
            // if role is admin, redirect to dashboard
            if (auth()->user()->roles->first()->name == 'Admin') {
                return redirect()->route('admin');
            }
            // // if role is diaken, redirect to dashboard
            // elseif (auth()->user()->roles->first()->name == 'Diaken') {
            //     return redirect()->route('diaken');
            // }
        }
        // logout user if role is not found
        auth()->logout();
        return redirect()->route('login');
    }
}
