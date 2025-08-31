<?php

namespace App\Providers;

use App\Models\Training;
use App\Policies\Domain\Trainings\TrainingPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Training::class => TrainingPolicy::class,
    ];

    public function boot(): void
    {
        //
    }
}
