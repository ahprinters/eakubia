<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            Auth::logout();
            return redirect()->route('admin.login')->withErrors(['email' => 'Unauthorized access.']);
        }

        return redirect()->route('admin.login')->withErrors(['email' => 'Invalid credentials.']);
    }
}
