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
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // return $next($request);
        if (auth()->check() && auth()->user()->is_admin) { // or auth()->user()->is_admin
            return $next($request);
        }
        return redirect('/'); // Redirect non-admins

        // Redirect to login if not authenticated
        // return redirect()->route('login');
    }
}
