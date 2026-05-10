<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrameController;

Route::get('/', [Controller::class, 'index']);
Route::get('/booth', [Controller::class, 'booth'])->name('booth');
Route::get('/frame', [Controller::class, 'frame'])->name('frame');

// Admin Auth Routes
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('logout');

// Admin Dashboard & CRUD
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('frames', FrameController::class);
});
