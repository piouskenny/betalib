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

Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::get('profile', [UserController::class, 'profile'])->name('profile');

Route::get('update_profile', [UserController::class, 'updateProfile'])->name('update_profile');

Route::post('update_profile_details', [UserController::class, 'update_profile_details'])->name('update_profile_details');