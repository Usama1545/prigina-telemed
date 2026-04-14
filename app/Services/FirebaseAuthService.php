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
}