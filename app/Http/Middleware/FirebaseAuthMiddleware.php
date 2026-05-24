<?php

namespace App\Http\Middleware;

use App\Services\FirebaseAuthService;
use App\Services\FirestoreService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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

        if (! $token) {
            return redirect('/login');
        }

        $authService = app(FirebaseAuthService::class);

        try {
            $verified = $authService->verifyToken($token);

        } catch (\Exception $e) {

            $refreshToken = session('firebase_refresh_token');

            if (! $refreshToken) {
                return redirect('/login');
            }

            $newToken = $authService->refreshIdToken($refreshToken);

            if (! $newToken) {
                return redirect('/login');
            }

            session(['firebase_token' => $newToken]);

            try {
                $verified = $authService->verifyToken($newToken);
            } catch (\Exception $e) {
                return redirect('/login');
            }
        }

        $uid = $verified->claims()->get('sub');
        $role = $verified->claims()->get('role');
        if (! $role) {
            $firestore = app(FirestoreService::class);

            $patient = $firestore->find('patients', $uid);
            $role = 'patient';
            if (! $patient) {
                $doctor = $firestore->find('doctors', $uid);
                $role = 'doctor';
                if (! $doctor) {
                    return redirect('/login');
                }
            }
        }

        session([
            'auth_uid' => $uid,
            'auth_role' => $role,
        ]);

        $request->merge([
            'auth_uid' => $uid,
            'auth_role' => $role,
        ]);

        return $next($request);
    }
}
