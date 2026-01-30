<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('developer.auth.login');
})->name('login');
