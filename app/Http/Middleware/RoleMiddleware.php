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
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Check if the user has one of the specified roles
        if (in_array(auth()->user()->role, $roles)) {
            return $next($request);
        }

        // Redirect or handle unauthorized access
        abort(403, 'Unauthorized access');
    }
}
