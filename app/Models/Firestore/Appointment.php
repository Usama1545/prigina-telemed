<?php

namespace App\Models\Firestore;
use App\Models\BaseModel;

class Appointment extends BaseModel
{
    protected string $collection = 'appointments';

    protected function checkAccess($user, string $action, ?array $data): bool
    {
        if ($user->role === 'admin') {
            return true;
        }

        switch ($action) {
            case 'view':
                return $user->role === 'doctor'
                    || ($user->role === 'patient');
            case 'create':
                return $user->role === 'patient';

            case 'update':
            case 'delete':
                return $user->role === 'doctor'
                    || ($user->role === 'patient');

            default:
                return false;
        }
    }
}