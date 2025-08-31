<?php

namespace App\Domain\Exercise\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Domain\Exercise\Models\Exercise;

class ExerciseLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'exercise_id',
        'started_at',
        'done',
        'notes',
    ];

    protected $casts = [
        'notes' => 'array',
        'started_at' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
}
