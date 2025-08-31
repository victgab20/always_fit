<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Domain\Training\Controllers\TrainingController;
use App\Domain\Exercise\Controllers\ExerciseController;
use App\Domain\Progress\Controllers\ProgressController;
use App\Http\Controllers\Auth\AuthTokenController;

Route::middleware('auth:sanctum')->get('/trainings', [TrainingController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('exercises', ExerciseController::class);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('progress', [ProgressController::class, 'index']);
    Route::post('progress/log', [ProgressController::class, 'store']);
});
