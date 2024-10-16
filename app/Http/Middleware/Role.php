<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Check if the authenticated user's role is in the list of roles allowed
        if (!in_array($request->user()->role, $roles)) {
            // If the user does not have the correct role, redirect them to the dashboard or another page
            return redirect('dashboard');
        }
    
        // If the user has the correct role, allow the request to proceed
        return $next($request);
    }
}
