<?php

namespace App\Models\Firestore;

use App\Models\BaseModel;

class SecondOpinionReport extends BaseModel
{
    protected string $collection = 'second_opinion_reports';

    protected function checkAccess($user, string $action, ?array $data): bool
    {
        if ($user->role === 'admin') {
            return true;
        }

        switch ($action) {
            case 'view':
                if ($user->role === 'doctor') {
                    return ! $data || ($data['doctorId'] ?? null) === $user->id;
                }
                if ($user->role === 'patient') {
                    return ! $data
                        || (($data['patientId'] ?? null) === $user->id
                            && ($data['status'] ?? '') === 'published');
                }

                return false;

            case 'create':
                return $user->role === 'doctor';

            case 'update':
                return $user->role === 'doctor'
                    && (! $data || ($data['doctor_id'] ?? null) === $user->id);

            default:
                return false;
        }
    }
}
