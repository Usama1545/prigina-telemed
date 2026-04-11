<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;

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
}