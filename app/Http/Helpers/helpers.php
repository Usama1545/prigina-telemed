<?php

use App\Services\FirebaseAuthService;
use App\Services\FirestoreService;
use App\Services\Zego\ZegoServerAssistant;

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

        // If Firestore timed-out or the document is missing, fall back to the
        // basic user data that was saved in the session at login time so the
        // user is not kicked back to the login screen unnecessarily.
        if (! $doc) {
            $sessionUser = session('auth_user', []);
            $doc = [
                'email' => $sessionUser['email'] ?? '',
                'name' => $sessionUser['name'] ?? '',
            ];
        }

        // Always expose both keys so callers can use either current_user()['uid']
        // or current_user()['id'] interchangeably.
        $doc['uid'] = $uid;
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

    function generateZegoToken(
        string $userId,
        int $effectiveSeconds = 3600
    ): ?string {
        try {
            $token = ZegoServerAssistant::generateToken04(
                (int) config('services.zego.app_id'),
                $userId,
                config('services.zego.server_secret'),
                $effectiveSeconds,
                ''
            );

            return $token->token;

        } catch (Throwable $e) {

            Log::error('ZEGO token generation failed', [
                'message' => $e->getMessage(),
                'userId' => $userId,
            ]);

            return null;
        }
    }
}

if (! function_exists('user')) {

    function user()
    {
        if (! check()) {
            return null;
        }

        return [
            'uid' => session('auth_uid'),
            'role' => session('auth_role'),
        ];
    }
}
if (! function_exists('check')) {

    function check()
    {
        $token = session('firebase_token');

        if (! $token) {
            return false;
        }

        try {
            app(FirebaseAuthService::class)
                ->verifyToken($token);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
