<?php

namespace App\Domain\Training\Models;

use App\Models\User;
use App\Domain\Exercise\Models\Exercise;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Collection;

class Training extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','title','level','is_active'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'training_exercise')
            ->withPivot(['subtitle', 'goal_total', 'order'])
            ->orderByPivot('order');
    }

    public function scopeOwnedBy($query, User|int $user)
    {
        $id = $user instanceof User ? $user->id : $user;
        return $query->where('user_id', $id);
    }

    public function loadProgressForUser(User|int $user): static
    {
        $userId = $user instanceof User ? $user->id : $user;

        $this->loadMissing([
            'exercises' => function ($q) use ($userId) {
                $q->withSum(
                    ['logs as done_sum' => fn ($qq) => $qq->where('user_id', $userId)],
                    'done'
                );
            },
        ]);

        return $this;
    }
}
