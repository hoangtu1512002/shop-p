<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\Admin\AuthorizationController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserManagementController;



Route::get('admin/login', [AuthorizationController::class, 'loginForm'])->name('admin.login');
Route::post('admin/login', [AuthorizationController::class, 'login']);
Route::post('admin/logout', [AuthorizationController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->middleware(['admin.login', 'url.remove.trailing.slash'])->group(function () {
    Route::get('', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('can:view-dashboard');

    Route::prefix('category')->middleware('can:view-category')->group(function() {
        Route::get('', [CategoryController::class, 'index'])->name('admin.category.view');
    });

    Route::prefix('product')->middleware('can:view-product')->group(function() {
        Route::get('', [ProductController::class, 'index'])->name('admin.product.view');
        Route::get('create', [ProductController::class, 'create'])->name('admin.product.create');
    });

    Route::prefix('user')->middleware('can:view-user-manager')->group(function() {
        Route::get('management', [UserManagementController::class, 'index'])->name('admin.user.management.view');
    });
});
