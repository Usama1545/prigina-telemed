<?php

namespace App\Models\Firestore;
use App\Models\BaseModel;

class Patient extends BaseModel
{
    protected string $collection = 'patients';

    protected function checkAccess($user, string $action, ?array $data): bool
    {
        if ($user->role === 'admin') {
            return true;
        }

        switch ($action) {
            case 'create':
                return $user->role === 'doctor' || $user->role === 'admin';

            case 'view':
                return $user->role === 'doctor'
                    || ($user->role === 'patient' && $data['id'] === $user->id);

            case 'update':
            case 'delete':
                return $user->role === 'doctor'
                    || ($user->role === 'patient' && $data['id'] === $user->id);

            default:
                return false;
        }
    }
}