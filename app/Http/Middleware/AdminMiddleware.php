<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Pastikan sudah login dan role-nya admin
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            return redirect()->route('dashboard')
                ->with('error', 'Akses ditolak. Hanya admin yang boleh membuka halaman ini.');
        }

        return $next($request);
    }
}
