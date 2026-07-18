<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Restrict a route to the given role(s) (e.g. 'patient', 'doctor').
     *
     * A guest (no auth_role in the session) is let through untouched — this
     * middleware only blocks an authenticated user whose role isn't in the
     * allowed list. Pair it with 'firebase.auth' on routes that must also
     * require login.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $role = session('auth_role');

        if ($role && ! in_array($role, $roles, true)) {
            abort(403, 'You are not authorized to access this page.');
        }

        return $next($request);
    }
}
