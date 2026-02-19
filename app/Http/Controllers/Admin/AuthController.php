<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show the login form (shared for admin and client).
     */
    public function showLoginForm()
    {
        if (Auth::check()) {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            if (Auth::user()->role === 'client') {
                return redirect()->route('client.dashboard');
            }
        }

        return view('admin.auth.login');
    }

    /**
     * Handle login request for both admin and client.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            // Only allow admin and client roles
            if (!in_array($user->role, ['admin', 'client'])) {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Akun Anda tidak memiliki akses.',
                ])->onlyInput('email');
            }

            $request->session()->regenerate();

            // Redirect based on role
            if ($user->role === 'client') {
                return redirect()->intended(route('client.dashboard'))
                    ->with('success', 'Selamat datang, ' . $user->name . '!');
            }

            return redirect()->intended(route('admin.dashboard'))
                ->with('success', 'Selamat datang, ' . $user->name . '!');
        }

        return back()->withErrors([
            'email' => 'Email atau password tidak valid.',
        ])->onlyInput('email');
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')
            ->with('success', 'Anda telah berhasil logout.');
    }
}
