<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;


// Users View and functionality

Route::get('/', [UserController::class, 'index'])->name('index')->middleware('userAuth');

Route::get('/signup', [UserController::class, 'create'])->name('signup');

Route::get('/login', [UserController::class, 'login'])->name('login');

Route::post('/store', [UserController::class, 'store'])->name('store');

Route::post('/check', [UserController::class, 'check'])->name('check');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('userAuth');

Route::get('/update_profile', [UserController::class, 'updateProfile'])->name('update_profile')->middleware('userAuth');

Route::post('/update_profile_details', [UserController::class, 'update_profile_details'])->name('update_profile_details')->middleware('userAuth');

Route::get('/show/{id}', [UserController::class, 'show_file'])->name('show_file')->middleware('userAuth');

Route::get('/download/{id}', [UserController::class, 'download'])->name('download')->middleware('userAuth');

Route::get('/description/{id}', [UserController::class, 'description'])->name('description')->middleware('userAuth');

Route::get('/add_review/{id}', [UserController::class, 'add_review'])->name('add_review')->middleware('userAuth');

Route::post('/upload_review', [UserController::class, 'upload_review'])->name('upload_review')->middleware('userAuth');



// Admin View and functionality

Route::get('/bl-admin', [AdminController::class, 'index'])->name('bl-admin_index');

Route::get('bl-admin/signup', [AdminController::class, 'create'])->name('bl-admin_signup');

Route::get('bl-admin/login', [AdminController::class, 'login'])->name('bl-admin_login');

Route::post('bl-admin/store', [AdminController::class, 'store'])->name('bl-admin_store');

Route::post('bl-admin/check', [AdminController::class, 'check'])->name('bl-admin_check');

Route::get('bl-admin/logout', [AdminController::class, 'logout'])->name('bl-admin_logout');

Route::get('bl-admin/add_book', [AdminController::class, 'add_book'])->name('bl-admin_add_book');

Route::post('bl-admin/store_book', [AdminController::class, 'store_book'])->name('bl-admin_store_book');

Route::get('bl-admin/all_books', [AdminController::class, 'all_books'])->name('bl-admin_all_books');

Route::get('bl-admin/add_file/{id}', [AdminController::class, 'add_file'])->name('bl-admin_add_file');

Route::post('bl-admin/store_file', [AdminController::class, 'store_file'])->name('bl-admin_store_file');
