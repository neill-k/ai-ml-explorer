<?php

use Illuminate\Support\Facades\Route;
use App\Models\AiModel;

Route::get('/', function () {
    return view('welcome');
});

// Public routes for models
Route::get('/models', function () {
    return view('models.index');
})->name('models.index');

Route::get('/models/{model}', function (AiModel $model) {
    $model->load(['tasks', 'useCases']);
    return view('models.show', compact('model'));
})->name('models.show');

// Protected routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
