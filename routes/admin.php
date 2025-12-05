<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Middleware\AdminAuthMiddleware;

Route::get('/login', [AdminLoginController::class, 'index'])->name('login');
Route::post('/login', [AdminLoginController::class, 'store']);

Route::middleware(AdminAuthMiddleware::class)->group(function () {
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

    Route::get('/dashboard', function () {
        return view('admin.pages.dashboard');
    })->name('dashboard');
});
