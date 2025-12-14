<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('teacher-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'teacher') {
                return redirect()->route('teacher.dashboard');
            }
            Auth::logout();
            return redirect()->route('teacher.login')->withErrors(['email' => 'Unauthorized access.']);
        }

        return redirect()->route('teacher.login')->withErrors(['email' => 'Invalid credentials.']);
    }
}
