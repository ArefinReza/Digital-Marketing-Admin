<?php

namespace App\Policies;

use App\Models\User;

class AdminPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function viewAdminPanel(User $user)
    {
        return $user->role === 'admin'; // Change 'admin' to whatever condition you want
    }
}
