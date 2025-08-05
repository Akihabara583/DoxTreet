<?php

namespace App\Policies;

use App\Models\SignedDocument;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SignedDocumentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SignedDocument $signedDocument): bool
    {
        return $user->id === $signedDocument->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SignedDocument $signedDocument): bool
    {
        return $user->id === $signedDocument->user_id;
    }
}
