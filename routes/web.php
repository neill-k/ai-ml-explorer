<?php

use Illuminate\Support\Facades\Route;
use App\Models\AiModel;
use App\Models\Task;
use App\Models\ModelFamily;

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

// Public routes for tasks
Route::get('/tasks', function () {
    return view('tasks.index');
})->name('tasks.index');

Route::get('/tasks/{task}', function (Task $task) {
    $task->load(['models']);
    return view('tasks.show', compact('task'));
})->name('tasks.show');

// Public routes for model families
Route::get('/model-families', function () {
    return view('model-families.index');
})->name('model-families.index');

Route::get('/model-families/{modelFamily}', function (ModelFamily $modelFamily) {
    $modelFamily->load(['models']);
    return view('model-families.show', compact('modelFamily'));
})->name('model-families.show');

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
