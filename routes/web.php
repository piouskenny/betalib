<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;


// Users View and functionality
Route::get('/', [UserController::class, 'index'])->name('index');

Route::get('/signup', [UserController::class, 'create'])->name('signup');

Route::get('/login', [UserController::class, 'login'])->name('login');

Route::post('/store', [UserController::class, 'store'])->name('store');

Route::post('/check', [UserController::class, 'check'])->name('check');