<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Checks if user is authenticated and has admin role.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu.');
        }

        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses tidak diizinkan. Hanya admin yang dapat mengakses halaman ini.');
        }

        return $next($request);
    }
}
