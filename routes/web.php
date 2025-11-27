<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin/dashboard', function () {
    return view('admin.pages.dashboard');
});

Route::get('/admin/projects', function () {
    return view('admin.pages.projects.index');
});

Route::get('/admin/project-create', function () {
    return view('admin.pages.projects.create');
});

Route::get('/admin/project-edit', function () {
    return view('admin.pages.projects.edit');
});