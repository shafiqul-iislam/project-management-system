<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Developer\ProjectController;
use App\Http\Controllers\Developer\Auth\DeveloperLoginController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/register', [DeveloperLoginController::class, 'register'])->name('register');
Route::post('/register', [DeveloperLoginController::class, 'registerStore'])->name('register.store');

Route::get('/login', [DeveloperLoginController::class, 'index'])->name('login');
Route::post('/login', [DeveloperLoginController::class, 'login'])->name('login.store');

Route::middleware('auth:developer')->group(function () {
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/{project}/tasks', [ProjectController::class, 'tasks'])->name('projects.tasks');
    Route::post('/projects/{project}/tasks', [ProjectController::class, 'storeTask'])->name('projects.tasks.store');
    Route::put('/projects/tasks/update', [ProjectController::class, 'updateTask'])->name('projects.tasks.update');

    // Profile Routes
    Route::get('/profile', [\App\Http\Controllers\Developer\ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [\App\Http\Controllers\Developer\ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [\App\Http\Controllers\Developer\ProfileController::class, 'updatePassword'])->name('profile.password');

    Route::post('/logout', [DeveloperLoginController::class, 'logout'])->name('logout');
});
