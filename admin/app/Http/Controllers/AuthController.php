<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
          $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Test credentials without database
        $testEmail = 'anirban123@gmail.com';
        $testPassword = '1234';

        if ($request->email === $testEmail && $request->password === $testPassword) {
            Session::put('user_id', 'Admin');
            return redirect('/admin/dashboard');
        } else {
            return back()->with('error', 'Invalid Email or Password');
        }
    }
}
