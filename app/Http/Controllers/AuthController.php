<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Login()
    {
        return view('pages.login');
    }

    /**
     * Process the form for login.
     */
    public function Authenticate(Request $request) : RedirectResponse {
        try {
            $credentials = $request->validate([
                'email' =>  ['required', 'email'],
                'password' => ['required'],
            ]);

            $user = User::where('email', $request->email)->first();
            if ($user == null) {
                return back()->withErrors([
                    'loginErr' => 'User Not Found',
                ]);
            } elseif ($user->is_active == false) {
                return back()->withErrors([
                    'loginErr' => 'User Not Active, Please ask to your Administrator',
                ]);
            }

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $request->session()->regenerate();
                return redirect()->intended('dashboard');
            }
    
            return back()->withErrors([
                'loginErr' => 'Login Failed!',
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }
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
