<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login()
    {
        return view('auth.login');
    }

    function store(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::where('email', $email)->first();
        $credentials = $request->only('email', 'password');
        if ($user) {
            if (password_verify($password, $user->password)) {
                if (Auth::attempt($credentials)) {
                    return redirect()->route('dashboard');
                }
            } else {
                return redirect()->route('login')->with('error', 'Password salah');
            }
        } else {
            return redirect()->route('login')->with('error', 'Email tidak terdaftar');
        }
    }

    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
