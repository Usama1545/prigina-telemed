<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\FirebaseAuthService;

class FirebaseAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Try from header (API)
        $token = $request->bearerToken();

        // ✅ fallback for Blade (session)
        if (!$token) {
            $token = session('firebase_token');
        }

        if (!$token) {
            return redirect('/login');
        }

        $authService = app(FirebaseAuthService::class);

        try {
            $verified = $authService->verifyToken($token);
        } catch (\Exception $e) {
            return redirect('/login');
        }

        $uid = $verified->claims()->get('sub');
        $role = $verified->claims()->get('role');

        $request->merge([
            'auth_uid' => $uid,
            'auth_role' => $role,
        ]);

        return $next($request);
    }
}
