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
    /**
     * Generate a ZegoCloud Token04 using AES-128-CBC — the only format ZegoCloud accepts.
     * The server secret must be exactly 32 ASCII characters as shown in the ZegoCloud console.
     */
    function generateZegoToken(string $userId, int $effectiveSeconds = 3600): string
    {
        $appId  = (int) config('services.zego.app_id');
        $secret = config('services.zego.server_secret'); // must be exactly 32 chars

        $createTime = time();
        $expireAt   = $createTime + $effectiveSeconds;
        $nonce      = mt_rand(-2147483648, 2147483647);

        $plaintext = json_encode([
            'app_id'  => $appId,
            'user_id' => $userId,
            'nonce'   => $nonce,
            'ctime'   => $createTime,
            'expire'  => $expireAt,
            'payload' => '',
        ]);

        $iv         = random_bytes(16);
        $ciphertext = openssl_encrypt($plaintext, 'aes-128-cbc', $secret, OPENSSL_RAW_DATA, $iv);

        // Binary layout: [iv_len 2B big-endian][iv 16B][ciphertext_len 4B big-endian][ciphertext]
        $buf = pack('n', strlen($iv))
             . $iv
             . pack('N', strlen($ciphertext))
             . $ciphertext;

        return '04' . base64_encode($buf);
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
