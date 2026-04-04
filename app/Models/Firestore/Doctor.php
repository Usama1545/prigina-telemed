<?php

namespace App\Models\Firestore;
use App\Models\BaseModel; 

class Doctor extends BaseModel
{
    protected string $collection = 'doctors';

    protected function checkAccess($user, string $action, ?array $data): bool
    {
        if ($user->role === 'admin') return true;

        switch ($action) {
            case 'view':
                return $data['isActive'] ?? false;

            case 'update':
                return $user->id === ($data['uid'] ?? null);

            default:
                return false;
        }
    }

    // Optional helper
    public function featured()
    {
        return $this->all()
            ->where('isActive', true)
            ->where('isVerified', true)
            ->take(10)
            ->values();
    }

    public function mapDocument($doc)
    {
        $data = parent::mapDocument($doc);

        if (!$data) return null;

        if (!empty($data['uid'])) {
            $data['profile_image'] = app(\App\Services\FirestoreService::class)
                ->getStorageUrl("doctor_profiles/{$data['uid']}.jpg");
        }

        return $data;
    }
}