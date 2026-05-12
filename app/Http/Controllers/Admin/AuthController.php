<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\LoginOtpMail;
use App\Models\LoginActivity;
use App\Models\TrustedDevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
                // LoginActivity::log($user->id, $request->email, $request->ip(), $request->userAgent(), 'failed');
                return back()->withErrors([
                    'email' => 'Akun Anda tidak memiliki akses.',
                ])->onlyInput('email');
            }

            // Client users: skip OTP, direct login
            if ($user->role === 'client') {
                $request->session()->regenerate();
                // LoginActivity::log($user->id, $request->email, $request->ip(), $request->userAgent(), 'success');
                return redirect()->intended(route('client.dashboard'))
                    ->with('success', 'Selamat datang, ' . $user->name . '!');
            }

            // === BYPASS OTP TEMPORARILY ===
            // Admin users: check trusted device
            /*
            if (TrustedDevice::isTrusted($user->id, $request->ip(), $request->userAgent())) {
                // Trusted device → direct login
                $request->session()->regenerate();
                LoginActivity::log($user->id, $request->email, $request->ip(), $request->userAgent(), 'success');
                return redirect()->intended(route('admin.dashboard'))
                    ->with('success', 'Selamat datang, ' . $user->name . '!');
            }

            // New device → send OTP
            Auth::logout(); // Logout temporarily until OTP verified
            $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

            $user->update([
                'login_otp' => bcrypt($otp),
                'login_otp_expires_at' => now()->addMinutes(5),
            ]);

            // Send OTP email (skip gracefully in debug mode if SMTP fails)
            $emailSent = false;
            try {
                Mail::to($user->email)->send(new LoginOtpMail(
                    $otp,
                    $user->name,
                    $request->ip(),
                    $request->userAgent()
                ));
                $emailSent = true;
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('OTP Email Error: ' . $e->getMessage());
                if (!config('app.debug')) {
                    return back()->withErrors([
                        'email' => 'Gagal mengirim kode verifikasi. Silakan coba lagi.',
                    ])->onlyInput('email');
                }
                // In debug mode, continue — OTP will be shown on page
            }

            LoginActivity::log($user->id, $request->email, $request->ip(), $request->userAgent(), 'otp_sent');

            // Store necessary data in session for OTP verification
            $request->session()->put('otp_user_id', $user->id);
            $request->session()->put('otp_email', $user->email);
            $request->session()->put('otp_remember', $remember);

            // In debug mode, store OTP in session so it can be displayed on the page
            if (config('app.debug')) {
                $request->session()->put('otp_code_debug', $otp);
            }

            $message = $emailSent
                ? 'Kode verifikasi telah dikirim ke email Anda.'
                : 'Mode Development: Kode OTP ditampilkan di halaman verifikasi.';

            return redirect()->route('admin.otp.show')
                ->with('success', $message);
            */

            // Temporary direct login for admin
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'))
                ->with('success', 'Selamat datang, ' . $user->name . '!');
        }

        // Failed login attempt
        // LoginActivity::log(null, $request->email, $request->ip(), $request->userAgent(), 'failed');

        return back()->withErrors([
            'email' => 'Email atau password tidak valid.',
        ])->onlyInput('email');
    }

    /**
     * Show OTP verification form.
     */
    public function showOtpForm(Request $request)
    {
        if (!$request->session()->has('otp_user_id')) {
            return redirect()->route('admin.login')
                ->with('error', 'Sesi verifikasi tidak ditemukan. Silakan login ulang.');
        }

        return view('admin.auth.verify-otp');
    }

    /**
     * Verify OTP code.
     */
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|string|size:6',
        ]);

        $userId = $request->session()->get('otp_user_id');
        $remember = $request->session()->get('otp_remember', false);

        if (!$userId) {
            return redirect()->route('admin.login')
                ->with('error', 'Sesi verifikasi telah berakhir. Silakan login ulang.');
        }

        $user = \App\Models\User::find($userId);

        if (!$user || !$user->login_otp || !$user->login_otp_expires_at) {
            return redirect()->route('admin.login')
                ->with('error', 'Kode verifikasi tidak valid.');
        }

        // Check if OTP expired
        if (now()->isAfter($user->login_otp_expires_at)) {
            $user->update(['login_otp' => null, 'login_otp_expires_at' => null]);
            return back()->withErrors(['otp' => 'Kode verifikasi telah kedaluwarsa. Silakan kirim ulang.']);
        }

        // Verify OTP
        if (!password_verify($request->otp, $user->login_otp)) {
            return back()->withErrors(['otp' => 'Kode verifikasi tidak valid.']);
        }

        // OTP valid → login
        $user->update(['login_otp' => null, 'login_otp_expires_at' => null]);

        // Trust this device for 30 days
        TrustedDevice::trustDevice($user->id, $request->ip(), $request->userAgent());

        // Login user
        Auth::login($user, $remember);
        $request->session()->regenerate();

        // Clean up session
        $request->session()->forget(['otp_user_id', 'otp_email', 'otp_remember']);

        LoginActivity::log($user->id, $user->email, $request->ip(), $request->userAgent(), 'otp_verified');

        return redirect()->intended(route('admin.dashboard'))
            ->with('success', 'Selamat datang, ' . $user->name . '! Perangkat ini telah dipercaya selama 30 hari.');
    }

    /**
     * Resend OTP code.
     */
    public function resendOtp(Request $request)
    {
        $userId = $request->session()->get('otp_user_id');

        if (!$userId) {
            return redirect()->route('admin.login')
                ->with('error', 'Sesi verifikasi tidak ditemukan.');
        }

        $user = \App\Models\User::find($userId);

        if (!$user) {
            return redirect()->route('admin.login')
                ->with('error', 'User tidak ditemukan.');
        }

        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        $user->update([
            'login_otp' => bcrypt($otp),
            'login_otp_expires_at' => now()->addMinutes(5),
        ]);

        try {
            Mail::to($user->email)->send(new LoginOtpMail(
                $otp,
                $user->name,
                $request->ip(),
                $request->userAgent()
            ));
        } catch (\Exception $e) {
            return back()->withErrors(['otp' => 'Gagal mengirim kode. Silakan coba lagi.']);
        }

        LoginActivity::log($user->id, $user->email, $request->ip(), $request->userAgent(), 'otp_sent');

        return back()->with('success', 'Kode verifikasi baru telah dikirim ke email Anda.');
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
