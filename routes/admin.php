<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminAuthMiddleware;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\DeveloperController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;

Route::get('/login', [AdminLoginController::class, 'index'])->name('login');
Route::post('/login', [AdminLoginController::class, 'store']);

Route::middleware(AdminAuthMiddleware::class)->group(function () {
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

    Route::get('/dashboard', function () {
        return view('admin.pages.dashboard');
    })->name('dashboard');

    Route::resource('projects', ProjectController::class);
    Route::resource('developers', DeveloperController::class);

    Route::get('settings', [SettingsController::class, 'index'])->name('settings');
    Route::post('settings/general', [SettingsController::class, 'updateGeneralSettings'])->name('settings.general');
    Route::post('settings/system', [SettingsController::class, 'updateSystemSettings'])->name('settings.system');
});
