<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {   
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Harap login terlebih dahulu.');
        }

        $user = Auth::user();

        if ($user->role != ($roles)) {
            Auth::logout();
            return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke halaman ini, harap login kembali.');
        }

        return $next($request);
    }
}
