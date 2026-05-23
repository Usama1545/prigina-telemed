<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\FirebaseAuthService;

class AdminAuthMiddleware
{
    /**
     * Handle incoming request and verify admin authentication
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle($request, Closure $next): Response
    {
        $token = session('firebase_token');

        // Redirect to login if no token
        if (!$token) {
            return redirect('/admin/login');
        }

        $authService = app(FirebaseAuthService::class);

        try {
            $verified = $authService->verifyToken($token);
        } catch (\Exception $e) {
            // Try to refresh token
            $refreshToken = session('firebase_refresh_token');

            if (!$refreshToken) {
                session()->flush();
                return redirect('/admin/login');
            }

            $newToken = $authService->refreshIdToken($refreshToken);

            if (!$newToken) {
                session()->flush();
                return redirect('/admin/login');
            }

            session(['firebase_token' => $newToken]);

            try {
                $verified = $authService->verifyToken($newToken);
            } catch (\Exception $e) {
                session()->flush();
                return redirect('/admin/login');
            }
        }

        $uid = $verified->claims()->get('sub');
        $role = $verified->claims()->get('role');

        // Check if user has admin role
        if ($role !== 'admin') {
            session()->flush();
            return response()->view('errors.unauthorized', [], 403);
        }

        // Check if admin is active in Firestore
        try {
            $firestore = app(\App\Services\FirestoreService::class);
            $admin = $firestore->find('admins', $uid);

            if (!$admin || ($admin['isActive'] ?? false) === false) {
                session()->flush();
                return response()->view('errors.unauthorized', [], 403);
            }

            // Store admin data in request
            $request->merge([
                'auth_uid' => $uid,
                'auth_role' => $role,
                'admin_data' => $admin,
            ]);

        } catch (\Exception $e) {
            session()->flush();
            return response()->view('errors.unauthorized', [], 403);
        }

        return $next($request);
    }
}
