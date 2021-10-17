<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth()->user();
        return view('admin.perfil', ['user' => $user]);
    }

    public function change_password()
    {
        $user = Auth()->user();
        return view('admin.change-password', ['user' => $user]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect('/admin/perfil');
    }

    public function update_password(Request $request, User $user)
    {
        $password = Hash::make($request->password);
        $user->update(['password' => $password]);
        return redirect('/admin/dashboard');
    }
}
