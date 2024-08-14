<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ClientUser; // Assuming you're using a custom user model

class CustomLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.custom-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            // Redirect to the intended page or dashboard
            return redirect()->intended('/dashboard');
        }

        // If login fails, redirect back with an error
        return redirect()->back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }
}
