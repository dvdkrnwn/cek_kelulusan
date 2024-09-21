<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function Login()
    {
        return view('pages.login');
    }

    /**
     * Process the form for login.
     */
    public function Authenticate(Request $request)  {
        $credentials = $request->validate([
            'Email' =>  ['required', 'email'],
            'Password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'loginErr' => 'Login Failed!',
        ]);
    }

    /**
     * Process a to logout.
     */
    public function Logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login_page');
    }
}
