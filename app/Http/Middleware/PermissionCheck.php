<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PermissionCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        // basic auth check
        if (!Auth()->check()) {
            return redirect()->route('login')->with('error', 'Harap login terlebih dahulu.');
        }

        // If user has no spatie permission to some route, return to login page and end their session
        if (!Auth::user()->hasPermissionTo($request->route()->getName())) {
                Auth::logout();
        }


        return $next($request);
    }
}
