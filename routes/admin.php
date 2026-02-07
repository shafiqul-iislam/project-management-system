<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminAuthMiddleware;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\DeveloperController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;

Route::get('/', [AdminLoginController::class, 'index']);

Route::get('/login', [AdminLoginController::class, 'index'])->name('login');
Route::post('/login', [AdminLoginController::class, 'store']);

Route::middleware(AdminAuthMiddleware::class)->group(function () {
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/chart-data', [HomeController::class, 'chartData'])->name('dashboard.chart-data');

    Route::resource('projects', ProjectController::class);
    Route::get('project/{project}/assign-to', [ProjectController::class, 'assignTo'])->name('project.assign-to');
    Route::post('project/{project}/assign-to', [ProjectController::class, 'assignToStore'])->name('project.assign-to.store');

    Route::resource('developers', DeveloperController::class);

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('tasks', TaskController::class);

    Route::get('settings', [SettingsController::class, 'index'])->name('settings');
    Route::post('settings/general', [SettingsController::class, 'updateGeneralSettings'])->name('settings.general');
    Route::post('settings/system', [SettingsController::class, 'updateSystemSettings'])->name('settings.system');
    Route::post('settings/email', [SettingsController::class, 'updateEmailSettings'])->name('settings.email');
    Route::post('settings/notifications', [SettingsController::class, 'updateNotificationSettings'])->name('settings.notifications');
});
