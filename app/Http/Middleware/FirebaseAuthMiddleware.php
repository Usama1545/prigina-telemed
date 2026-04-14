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
        $token = session('firebase_token');

        if (!$token) {
            return redirect('/login');
        }

        $authService = app(FirebaseAuthService::class);

        try {
            $verified = $authService->verifyToken($token);

        } catch (\Exception $e) {

            $refreshToken = session('firebase_refresh_token');

            if (!$refreshToken) {
                return redirect('/login');
            }

            $newToken = $authService->refreshIdToken($refreshToken);

            if (!$newToken) {
                return redirect('/login');
            }

            // ✅ save new token
            session(['firebase_token' => $newToken]);

            // ✅ verify AGAIN
            try {
                $verified = $authService->verifyToken($newToken);
            } catch (\Exception $e) {
                return redirect('/login');
            }
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
