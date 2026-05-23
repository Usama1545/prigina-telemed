<?php

namespace App\Models\Firestore;

use App\Models\BaseModel;

class Admin extends BaseModel
{
    protected string $collection = 'admins';

    protected function checkAccess($user, string $action, ?array $data): bool
    {
        // Only admin role can access admin data
        if ($user->role !== 'admin') {
            return false;
        }

        switch ($action) {
            case 'view':
                return true;

            case 'update':
                // Admins can only update their own profile or be updated by super admin
                return $user->id === ($data['uid'] ?? null) || 
                       ($data['isSuperAdmin'] ?? false);

            case 'create':
                // Only super admin can create new admins
                return $data['isSuperAdmin'] ?? false;

            case 'delete':
                // Only super admin can delete admins
                return $data['isSuperAdmin'] ?? false;

            default:
                return false;
        }
    }

    /**
     * Check if admin has specific permission
     */
    public function hasPermission(string $permission): bool
    {
        $adminId = session('auth_uid');
        if (!$adminId) {
            return false;
        }

        try {
            $admin = $this->find($adminId);
            $permissions = $admin['permissions'] ?? [];
            return in_array($permission, $permissions);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Check if admin is super admin
     */
    public function isSuperAdmin($uid = null): bool
    {
        $adminId = $uid ?? session('auth_uid');
        if (!$adminId) {
            return false;
        }

        try {
            $admin = $this->find($adminId);
            return ($admin['isSuperAdmin'] ?? false) === true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
