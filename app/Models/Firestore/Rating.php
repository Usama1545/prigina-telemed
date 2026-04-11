<?php

namespace App\Models\Firestore;
use App\Models\BaseModel;

class Rating extends BaseModel
{
    protected string $collection = 'reviews';

    protected function checkAccess($user, string $action, ?array $data): bool
    {
        if ($user->role === 'admin') {
            return true;
        }

        switch ($action) {
            case 'view':
                return $user->role === 'doctor'
                    || ($user->role === 'patient' && $data['id'] === $user->id);

            default:
                return false;
        }
    }
}