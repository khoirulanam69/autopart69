<?php

namespace App\Http\Controllers;

use App\Mail\ChangePassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    function index()
    {
        return view('auth.forgotpassword');
    }

    function store(Request $request)
    {
        $email = $request->input('email');
        $user = User::where('email', $email)->first();
        if ($user) {
            $details = [
                'title' => 'Change your password',
                'body' => 'Klik link untuk membuat password baru : ' . route('newpassword', ['email' => $email])
            ];

            Mail::to($email)->send(new ChangePassword($details));

            return redirect()->route('forgotpassword')->with('success', 'Email has been sent');
        } else {
            return redirect()->route('login')->with('error', 'Email tidak terdaftar');
        }
    }

    function newPassword($email)
    {
        return view('auth.newpassword', ['email' => $email]);
    }

    function storeNewPassword(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $repassword = $request->input('repassword');
        if ($password === $repassword) {
            $user = User::where('email', $email)->first();
            $user->password = password_hash($password, PASSWORD_DEFAULT);
            $user->save();
            return redirect()->route('login')->with('success', 'Password berhasil diubah');
        } else {
            return redirect()->route('newpassword', ['email' => $email])->with('error', 'Password tidak sama');
        }
    }
}
