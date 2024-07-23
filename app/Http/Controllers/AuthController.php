<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    function index()
    {
        return view('welcome');
    }

    function login()
    {
        return view('auth.login');
    }

    function store(Request $request)
    {
        $email = $request->input('email');
        $password = password_hash($request->input('password'), PASSWORD_DEFAULT);
        $user = User::where('email', $email)->first();
        if ($user) {
            if (password_verify($password, $user->password)) {
                return redirect()->route('home');
            } else {
                return redirect()->route('login')->with('error', 'Password salah');
            }
        } else {
            return redirect()->route('login')->with('error', 'Email belum terdaftar');
        }
    }
}
