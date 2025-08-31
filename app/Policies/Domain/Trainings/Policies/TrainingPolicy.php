<?php

namespace App\Policies\Domain\Trainings;

use App\Models\Training;
use App\Models\User;

class TrainingPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Training $training): bool
    {
        return $training->user_id === $user->id;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Training $training): bool
    {
        return $training->user_id === $user->id;
    }

    public function delete(User $user, Training $training): bool
    {
        return $training->user_id === $user->id;
    }

    public function restore(User $user, Training $training): bool
    {
        return $training->user_id === $user->id;
    }

    public function forceDelete(User $user, Training $training): bool
    {
        return $training->user_id === $user->id;
    }
}
