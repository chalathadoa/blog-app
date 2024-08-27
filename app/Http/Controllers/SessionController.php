<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionCOntroller extends Controller
{
    function index()
    {
        return view('auth/login');
    }

    function login(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:account,username',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('beranda')->with('success', 'Login berhasil!');
        } else {
            return redirect()->back()->withErrors([
                'login_error' => 'Username atau password salah.'
            ])->withInput();
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout berhasil!');
    }
}
