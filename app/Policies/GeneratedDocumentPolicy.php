<?php

namespace App\Policies;

use App\Models\GeneratedDocument;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GeneratedDocumentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, GeneratedDocument $generatedDocument): bool
    {
        // Разрешить просмотр только владельцу документа
        return $user->id === $generatedDocument->user_id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, GeneratedDocument $generatedDocument): bool
    {
        // Разрешить обновление только владельцу документа
        return $user->id === $generatedDocument->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, GeneratedDocument $generatedDocument): bool
    {
        // Разрешить удаление только владельцу документа
        return $user->id === $generatedDocument->user_id;
    }
}
