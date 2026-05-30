<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;
use Illuminate\Support\Facades\Http;

class FirebaseAuthService
{
    protected Auth $auth;

    public function __construct()
    {
        $factory = (new Factory)
            ->withServiceAccount(storage_path('app/firebase/firebase_credentials.json'));

        $this->auth = $factory->createAuth();
    }

    public function verifyToken($idToken)
    {
        return $this->auth->verifyIdToken($idToken);
    }

    public function setCustomClaims($uid, $claims)
    {
        return $this->auth->setCustomUserClaims($uid, $claims);
    }

    public function deleteUser(string $uid): void
    {
        $this->auth->deleteUser($uid);
    }

    public function sendPasswordResetLink(string $email): void
    {
        $this->auth->sendPasswordResetLink($email);
    }

    public function sendEmailVerification(string $email): void
    {
        $this->auth->sendEmailVerificationLink($email);
    }

    public function refreshIdToken($refreshToken)
    {
        $response = Http::post(
            'https://securetoken.googleapis.com/v1/token?key=' . config('services.firebase.api_key'),
            [
                'grant_type' => 'refresh_token',
                'refresh_token' => $refreshToken,
            ]
        );

        if ($response->failed()) {
            return null;
        }

        return $response->json()['id_token'] ?? null;
    }

    public function verifyPassword(string $email, string $password): bool
    {
        $response = Http::post(
            'https://identitytoolkit.googleapis.com/v1/accounts:signInWithPassword?key=' . config('services.firebase.api_key'),
            [
                'email'             => $email,
                'password'          => $password,
                'returnSecureToken' => false,
            ]
        );

        return $response->successful();
    }

    public function updatePassword(string $uid, string $newPassword): void
    {
        $this->auth->changeUserPassword($uid, $newPassword);
    }

    public function createUser(array $data)
    {
        try {

            $user = $this->auth->createUser([
                'email' => $data['email'],
                'password' => $data['password'],
                'displayName' => $data['name'] ?? null,
                'emailVerified' => $data['emailVerified'] ?? false,
                'disabled' => false,
            ]);

            if (!empty($data['claims'])) {
                $this->auth->setCustomUserClaims(
                    $user->uid,
                    $data['claims']
                );
            }

            return [
                'success' => true,
                'uid' => $user->uid,
                'user' => $user,
            ];

        } catch (\Throwable $e) {

            return [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }
    }
}
