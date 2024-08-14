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
        // Check if the logged-in user is the admin
        if ($request->user() && $request->user()->email === 'admin@example.com') {
            return $next($request);
        }

        return redirect('/'); // Redirect to the homepage if not admin
    }
}
