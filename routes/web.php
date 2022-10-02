<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;

Route::get('/',  function () {
    return view('login');
})->name('home')->middleware('guest');
Route::get('/demo',[AdminController::class, 'demoTable']);

Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('vendor/dashboard', [VendorController::class, 'dashboard'])->name('vendor.dashboard');
Route::post('user/login', [AuthController::class, 'login'])->name('login'); 
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/unique_email',[AuthController::class, 'unique_email'])->name('unique_email');
Route::get('/users', [AdminController::class, 'index']);
Route::post('/adduser',[AdminController::class, 'addUser'])->name('adduser');
Route::get('edit-user/{id}', [AdminController::class, 'editUser'])->name('edit-user');
Route::put('update-user/{id}', [AdminController::class, 'updateUser'])->name('update-user');
Route::get('delete-user/{id}', [AdminController::class, 'deleteUser'])->name('delete-user');

Route::get('/vendors',[AdminController::class, 'vendor'])->name('vendor');

