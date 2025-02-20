<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskListController;
use Illuminate\Support\Facades\Route;

// Membuat route untuk halaman utama (home)
Route::get('/', [TaskController::class, 'index'])->name('home');

// Menyediakan resource routes untuk TaskListController (CRUD otomatis untuk TaskList)
Route::resource('lists', TaskListController::class);

// Menyediakan resource routes untuk TaskController (CRUD otomatis untuk Task)
Route::resource('tasks', TaskController::class);

// Route untuk menandai tugas sebagai selesai dengan metode PATCH
Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');

// Route untuk memindahkan tugas ke daftar tugas lain dengan metode PATCH
Route::patch('/tasks/{task}/change-list', [TaskController::class, 'changeList'])->name('tasks.changeList');

Route::get('/profil', [TaskController::class, 'profil'])->name('profil');