<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Adminlogin;
use App\Http\Middleware\Userlogin;
use Illuminate\Support\Facades\Route;



Route::middleware('auth', 'verified', Userlogin::class)->prefix('dashboard')->group(function () {

    // Dashboard route
    Route::get('/', [Admin::class, 'index'])->name('dashboard');

    // Product routes
    Route::get('/products', [Admin::class, 'products'])->name('dashboard.products');
    Route::get('/products/create', [Admin::class, 'createProduct'])->name('dashboard.products.create');
    Route::post("/products/store", [Admin::class, "storeProduct"])->name("dashboard.products.store");
    Route::get('/products/edit', [Admin::class, 'editProduct'])->name('dashboard.products.edit');
    Route::get('/products/delete', [Admin::class, 'deleteProduct'])->name('dashboard.products.delete');
    Route::get('/products/show/{product}', [Admin::class, 'showProduct'])->name('dashboard.products.show');

    //category routes
    Route::get('/categories', [Admin::class, 'categories'])->name('dashboard.categories');
    Route::get('/categories/create', [Admin::class, 'createCategory'])->name('dashboard.categories.create');
    Route::get('/categories/edit', [Admin::class, 'editCategory'])->name('dashboard.categories.edit');
    Route::get('/categories/delete', [Admin::class, 'deleteCategory'])->name('dashboard.categories.delete');
    Route::get('/categories/show', [Admin::class, 'showCategory'])->name('dashboard.categories.show');

    //collection routes
    Route::get('/collections', [Admin::class, 'collection'])->name('dashboard.collections');
    Route::get('/collections/create', [Admin::class, 'createCollection'])->name('dashboard.collections.create');
    Route::get('/collections/edit', [Admin::class, 'editCollection'])->name('dashboard.collections.edit');
    Route::get('/collections/delete', [Admin::class, 'deleteCollection'])->name('dashboard.collections.delete');
    Route::get('/collections/show', [Admin::class, 'showCollection'])->name('dashboard.collections.show');

    //order routes
    Route::get('/orders', [Admin::class, 'adminOrderConfirm'])->name('dashboard.orders');
    Route::get('/orders/detail/{order}', [Admin::class, 'adminOrderdetail'])->name('dashboard.orders.detail');


    // order status update route
    Route::post("/orders/{order}/update-status", [Admin::class, "updateOrderStatus"])->name("dashboard.orders.update_status");
});


Route::middleware('auth', 'verified', Adminlogin::class)->prefix('users')->group(function () {

    // User Dashboard route
    Route::get('/', [Admin::class, 'userindex'])->name('users.index');
});


//  Route::get('/user' , [Admin::class , 'userindex'])->name('users.index');


Route::get('/confirmordermail', [ProductController::class, 'confirm_email'])->name('confirm_email');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/site.php';
