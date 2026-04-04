<?php

namespace App\Models\Firestore;
use App\Models\BaseModel;

class Category extends BaseModel
{
    protected string $collection = 'categories';

    protected function checkAccess($user, string $action, ?array $data): bool
    {
        if ($action === 'view') return true;

        return $user->role === 'admin';
    }
}