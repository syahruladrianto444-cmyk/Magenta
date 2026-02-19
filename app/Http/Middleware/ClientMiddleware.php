<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Checks if user is authenticated and has client role.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu.');
        }

        if (auth()->user()->role !== 'client') {
            abort(403, 'Akses tidak diizinkan. Hanya client yang dapat mengakses halaman ini.');
        }

        return $next($request);
    }
}
