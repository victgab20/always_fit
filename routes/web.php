<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('nutricao', function () {
    return Inertia::render('Nutricao');
})->middleware(['auth', 'verified'])->name('nutricao');

Route::get('progresso', function () {
    return Inertia::render('Progresso');
})->middleware(['auth', 'verified'])->name('progresso');
Route::get('treinos', function () {
    return Inertia::render('Treinos');
})->middleware(['auth', 'verified'])->name('treinos');


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
