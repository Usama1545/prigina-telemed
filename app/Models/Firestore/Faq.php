<?php

namespace App\Models\Firestore;
use App\Models\BaseModel;

class Faq extends BaseModel
{
    protected string $collection = 'faqs';

    protected function checkAccess($user, string $action, ?array $data): bool
    {
        if ($action === 'view') return true;

        return $user->role === 'admin';
    }
}