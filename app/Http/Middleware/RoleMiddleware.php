<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // 1. Cek apakah user sudah login
        if (!$request->user()) {
            return redirect()->route('login');
        }

        // 2. Cek apakah role user ada di dalam daftar role yang diizinkan
        if (!in_array($request->user()->role, $roles)) {
            // Jika tidak sesuai, lempar error 403 (Forbidden) atau redirect ke halaman utama
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
            
            // Alternatif redirect: return redirect('/home')->with('error', 'Akses ditolak!');
        }

        return $next($request);
    }
}
