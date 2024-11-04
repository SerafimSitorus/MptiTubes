<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if ($user) {
            // Redirect based on role
            if ($user->role == 'superadmin') {
                return redirect()->route('superadmin/dashboard');
            } elseif ($user->role == 'operator') {
                return redirect()->route('operator/dashboard');
            } elseif ($user->role == 'tutor') {
                return redirect()->route('tutor/dashboard');
            } elseif ($user->role == 'parents') {
                return redirect()->route('parent/dashboard');
            } else {
                return redirect()->route('job_seeker/dashboard');
            }
        }

        return $next($request);
    }
}