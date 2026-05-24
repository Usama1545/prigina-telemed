<?php

use App\Services\FirebaseAuthService;
use App\Services\FirestoreService;

if (! function_exists('current_user')) {
    function current_user()
    {
        static $user = null; // request-level cache

        if ($user !== null) {
            return $user;
        }

        $uid = session('auth_uid');
        $role = session('auth_role');
        if (! $uid || ! $role) {
            return null;
        }

        $firestore = app(FirestoreService::class);

        $collection = match ($role) {
            'patient' => 'patients',
            'doctor' => 'doctors',
            default => null,
        };

        if (! $collection) {
            return null;
        }

        $doc = $firestore->find($collection, $uid);

        if (! $doc) {
            return null;
        }

        // attach meta
        $doc['id'] = $uid;
        $doc['role'] = $role;

        return $user = $doc;
    }
}

if (! function_exists('current_patient')) {
    function current_patient()
    {
        return session('auth_role') === 'patient' ? current_user() : null;
    }
}

if (! function_exists('current_doctor')) {
    function current_doctor()
    {
        return session('auth_role') === 'doctor' ? current_user() : null;
    }
}

if (! function_exists('is_patient')) {
    function is_patient()
    {
        return session('auth_role') === 'patient';
    }
}

if (! function_exists('is_doctor')) {
    function is_doctor()
    {
        return session('auth_role') === 'doctor';
    }
}

if (! function_exists('topSpeacilalization')) {
    function topSpeacilalization()
    {
        $firestore = app(FirestoreService::class);

        $categories = Cache::remember('footer.doctors.categories', 6000, function () use ($firestore) {
            return $firestore->get('categories', 5);
        });

        return $categories;
    }
}
if (! function_exists('generateZegoToken')) {
    function generateZegoToken($userId)
    {
        $appId = config('services.zego.app_id');
        $serverSecret = config('services.zego.server_secret');

        $payload = [
            'user_id' => $userId,
            'timestamp' => time(),
            'expire' => 3600,
        ];

        // Use official token generation logic (HMAC SHA256)
        $token = base64_encode(hash_hmac('sha256', json_encode($payload), $serverSecret, true));

        return $token;
    }
}

if (! function_exists('user')) {

    function user()
    {
        $token = session('firebase_token');

        if (! $token) {
            return null;
        }

        $authService = app(FirebaseAuthService::class);

        try {

            $verified = $authService->verifyToken($token);

        } catch (Exception $e) {

            $refreshToken = session('firebase_refresh_token');

            if (! $refreshToken) {
                session()->forget([
                    'firebase_token',
                    'firebase_refresh_token',
                ]);

                return null;
            }

            $newToken = $authService->refreshIdToken($refreshToken);

            if (! $newToken) {

                session()->forget([
                    'firebase_token',
                    'firebase_refresh_token',
                ]);

                return null;
            }

            session([
                'firebase_token' => $newToken,
            ]);

            try {

                $verified = $authService->verifyToken($newToken);

            } catch (Exception $e) {

                session()->forget([
                    'firebase_token',
                    'firebase_refresh_token',
                ]);

                return null;
            }
        }

        return [
            'uid' => $verified->claims()->get('sub'),
            'role' => $verified->claims()->get('role'),
            'email' => $verified->claims()->get('email'),
        ];
    }
}
if (! function_exists('check')) {
    function check()
    {
        return user() !== null;
    }
}
