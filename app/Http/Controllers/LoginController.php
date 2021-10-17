<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $req)
    {
        $credentials = $req->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $req->session()->regenerate();

            return redirect()->intended('/admin/dashboard');
        }

        return redirect('admin');
    }

    public function logout(Request $req)
    {
        Auth::logout();

        $req->session()->invalidate();

        return redirect('/');
    }
}
