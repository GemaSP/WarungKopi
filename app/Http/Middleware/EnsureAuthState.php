<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureAuthState
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if ($role === 'login' && Auth::check()) {
            return redirect('backend/dashboard')->withErrors(['login' => 'Anda sudah login.']);
        } elseif($role === 'not_login' && Auth::guest()) {
            return redirect('backend/login')->withErrors(['not_login' => 'Anda harus login terlebih dahulu.']);
        } 
        
        return $next($request);
    }
}
