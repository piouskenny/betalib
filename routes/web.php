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

Route::get('/show/{id}', [UserController::class, 'show_file'])->name('show_file');

Route::get('download/{id}', [UserController::class, 'download'])->name('download');

Route::get('description/{id}', [UserController::class, 'description'])->name('description');

Route::get('add_review/{id}', [UserController::class, 'add_review'])->name('add_review');

Route::post('upload_review', [UserController::class, 'upload_review'])->name('upload_review');


// Admin View and functionality

Route::prefix('/bl-admin')->group(
    function () {
        Route::get('/', [AdminController::class, 'index'])->name('bl-admin_index');

        Route::get('/signup', [AdminController::class, 'create'])->name('bl-admin_signup');

        Route::get('/login', [AdminController::class, 'login'])->name('bl-admin_login');

        Route::post('/store', [AdminController::class, 'store'])->name('bl-admin_store');

        Route::post('/check', [AdminController::class, 'check'])->name('bl-admin_check');

        Route::get('/logout', [AdminController::class, 'logout'])->name('bl-admin_logout');

        Route::get('/add_book', [AdminController::class, 'add_book'])->name('bl-admin_add_book');

        Route::post('/store_book', [AdminController::class, 'store_book'])->name('bl-admin_store_book');

        Route::get('/all_books', [AdminController::class, 'all_books'])->name('bl-admin_all_books');

        Route::get('/add_file/{id}', [AdminController::class, 'add_file'])->name('bl-admin_add_file');

        Route::post('/store_file', [AdminController::class, 'store_file'])->name('bl-admin_store_file');
    }
);
