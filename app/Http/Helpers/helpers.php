<?php

use App\Services\FirebaseAuthService;
use App\Services\FirestoreService;
use App\Services\Zego\ZegoServerAssistant;
use Carbon\Carbon;
use Illuminate\Support\Arr;

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

        // Auth is valid (we have uid/role) but the Firestore doc came back empty —
        // this is usually a transient read failure, not a missing document, so
        // retry once live before trusting the (often stale/absent) session snapshot.
        if (! $doc) {
            $doc = $firestore->find($collection, $uid);
        }

        if (! $doc) {
            // Both reads came back empty. Find out whether that's because the
            // account was actually deleted, or Firestore just isn't reachable.
            if ($firestore->documentExists($collection, $uid) === false) {
                // Confirmed gone: don't keep serving a half-authenticated
                // session that will trip over missing fields everywhere.
                // Force a real logout and stop the current request right
                // here, however far into rendering it already got, since
                // current_user() is called from views as well as controllers.
                session()->invalidate();

                abort(redirect()->route('login'));
            }

            // Unknown/outage: fall back to the basic user data that was saved
            // in the session at login time so the user is not kicked back to
            // the login screen unnecessarily.
            $sessionUser = session('auth_user', []);
            $doc = [
                'email' => $sessionUser['email'] ?? '',
                'name' => $sessionUser['name'] ?? '',
            ];
        }

        // Firestore is schemaless, and legacy/manually-edited documents have
        // been seen storing these as a single string instead of a list —
        // normalize so callers can always safely foreach() them.
        foreach (['qualification', 'specializations'] as $listField) {
            if (isset($doc[$listField])) {
                $doc[$listField] = array_values(array_filter(Arr::wrap($doc[$listField]), 'filled'));
            }
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

if (! function_exists('patient_cta_route')) {
    /**
     * Where a "Get a Second Opinion" / "Book Now" style CTA should send the
     * visitor: guests go to the given auth route, patients go to the doctors
     * listing, and doctors (who can't book other doctors) go to their own
     * dashboard instead of hitting the patient-only /doctors route.
     */
    function patient_cta_route(string $guestRoute = 'login')
    {
        if (! check()) {
            return route($guestRoute);
        }

        return is_doctor() ? route('doctor.dashboard') : route('doctors');
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

if (! function_exists('patient_age')) {
    function patient_age(?string $dob): string|int
    {
        if (blank($dob)) {
            return '';
        }

        try {
            return Carbon::parse($dob)->age;
        } catch (Throwable) {
            return '';
        }
    }
}

if (! function_exists('getQualifications')) {
    function getQualifications()
    {
        $firestore = app(FirestoreService::class);

        $qualifications = $firestore->get('qualifications');

        return array_values(array_filter($qualifications, fn ($qualification) => $qualification['isActive'] ?? false));
    }
}

if (! function_exists('getExperienceRanges')) {
    function getExperienceRanges()
    {
        $firestore = app(FirestoreService::class);

        $qualifications = $firestore->get('experience_ranges');

        return array_values(array_filter($qualifications, fn ($qualification) => $qualification['isActive'] ?? false));
    }
}
