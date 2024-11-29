<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Pastikan pengguna login
        if (!Auth::check()) {
            return redirect('/login'); // Redirect ke halaman login jika belum login
        }

        // Periksa peran pengguna
        if (Auth::user()->role !== $role) {
            return redirect()->route('unauthorized'); // Redirect ke halaman unauthorized
        }

        return $next($request);
    }
}
