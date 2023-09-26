<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\User;

class UserPolicy
{
    public function isAdmin(User $user)
    {
        return $user->isAdmin;
    }
}
