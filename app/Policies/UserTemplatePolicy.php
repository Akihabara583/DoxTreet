<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserTemplate;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserTemplatePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, UserTemplate $userTemplate): bool
    {
        return $user->id === $userTemplate->user_id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, UserTemplate $userTemplate): bool
    {
        return $user->id === $userTemplate->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, UserTemplate $userTemplate): bool
    {
        return $user->id === $userTemplate->user_id;
    }
}
