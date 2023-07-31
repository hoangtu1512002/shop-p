<?php

use App\Http\Controllers\admin\ApiController;
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

    Route::prefix('category')->middleware('can:view-category')->group(function () {
        Route::get('', [CategoryController::class, 'index'])->name('admin.category.view');
        Route::get('create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('create', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::post('delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
        Route::get('stop/selling', [CategoryController::class, 'getStopSelling'])->name('admin.category.stop.selling.view');
        Route::post('stop/selling/{id}', [CategoryController::class, 'stopSelling'])->name('admin.category.stop.selling');
        Route::post('restore/{id}', [CategoryController::class, 'restore'])->name('admin.category.restore');
    });

    Route::prefix('product')->middleware('can:view-product')->group(function () {
        Route::get('', [ProductController::class, 'index'])->name('admin.product.view');
        Route::get('create', [ProductController::class, 'create'])->name('admin.product.create');
        Route::post('create', [ProductController::class, 'create'])->name('admin.product.store');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::post('update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
        Route::post('delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');
    });

    Route::prefix('user-management')->middleware('can:view-user-manager')->group(function () {
        Route::get('', [UserManagementController::class, 'getStaff'])->name('admin.user.management.staff');
        Route::get('customer', [UserManagementController::class, 'getCustomers'])->name('admin.user.management.customer');
        Route::get('staff/create', [UserManagementController::class, 'createStaff'])->name('admin.user.management.create.staff');
        Route::post('staff/store', [UserManagementController::class, 'storeStaff'])->name('admin.user.management.store.staff');
    });
    Route::post('get/permission/{role_id}', [ApiController::class, 'apiGetPermissionByRole']);
});
