<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;




Route::get('/', [ProductController::class , 'index'])->name('home');
Route::get('/products', [ProductController::class , 'allProducts'])->name('products');
Route::get('/bike/{product:slug}', [ProductController::class , 'singleProduct'])->name('singleproduct');
Route::get('/cart', [ProductController::class , 'cart'])->name('cart');
Route::get('/checkout/{product:slug}/shop', [ProductController::class , 'checkout'])->name('checkout');
Route::post('/checkout/{product:slug}/account',[ProductController::class, 'createorder'])->name('checkout.order');
Route::get('/account', [ProductController::class , 'account'])->name('account');

// Stripe callback routes
Route::get('/stripe/success', [ProductController::class, 'stripeSuccess'])->name('stripe.success');
Route::get('/stripe/cancel/{productSlug}', [ProductController::class, 'stripeCancel'])->name('stripe.cancel');

Route::get('/category', [CategoryController::class , 'index'])->name('category');
Route::get('/collection', [CollectionController::class , 'collection'])->name('collection');

