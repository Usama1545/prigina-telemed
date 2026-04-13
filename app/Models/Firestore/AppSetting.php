<?php

namespace App\Models\Firestore;
use App\Models\BaseModel;

class AppSetting extends BaseModel
{
    protected string $collection = 'app_settings';

    protected function checkAccess($user, string $action, ?array $data): bool
    {
        if ($user->role === 'admin') {
            return true;
        }

        return true;
    }
}