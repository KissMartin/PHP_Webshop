<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\UserProductController;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/cart', 'cart')->name('cart');
});

Route::controller(ProductController::class)->prefix('products')->group(function () {
    Route::get('/', 'index')->name('products');
    Route::get('/filter', 'filter')->name('products.filter');
    Route::get('/{product}', 'show')->name('product.show');
});

Route::controller(CartController::class)->prefix('cart')->group(function () {
    Route::get('/', 'index')->name('cart');
    Route::post('/', 'createOrder')->name('cart.create');
    Route::post('/add/{product}', 'store')->name('cart.store');
    Route::delete('/remove/{product}', 'destroy')->name('cart.destroy');
});

Route::middleware(['auth', 'verified'])->get('/home', [HomeController::class, 'index']);

Route::middleware('auth')
    ->prefix('profile')
    ->name('profile.')
    ->controller(ProfileController::class)
    ->group(
        function () {
            Route::get('/', 'profile')->name('profile');
            Route::get('/{user}', 'profile')->name('public');
            Route::get('/edit', 'edit')->name('edit');
            Route::patch('/', 'update')->name('update')->middleware('throttle:5,1');
            Route::delete('/', 'destroy')->name('destroy')->middleware('throttle:3,1');
});

Route::middleware(['auth', 'verified'])
    ->prefix('profile')
    ->name('profile.')
    ->controller(OrderController::class)
    ->group(function () {
        Route::get('/orders', 'index')->name('orders');
        Route::patch('/orders/{order}/cancel', 'cancel')->name('orders.cancel');
        Route::patch('/orders/{order}', 'updateStatus')->name('orders.update-status');
    });

Route::middleware(['auth', 'not_admin'])
    ->prefix('profile')
    ->name('profile.')
    ->controller(UserProductController::class)
    ->group(
        function () {
            Route::get('/products', 'index')->name('products');
            Route::post('/products', 'store')->name('products.store');
            Route::delete('/products/{product}', 'destroy')->name('products.destroy');
            Route::get('/products/{product}/edit', 'edit')->name('products.edit');
            Route::patch('/products/{product}', 'update')->name('products.update');
});

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->controller(AdminUserController::class)
    ->prefix('admin')
    ->name('admin.')
    ->group(
        function () {
            Route::get('/dashboard', 'index')->name('dashboard');
            Route::get('/users', 'users')->name('users');
            Route::get('/products', 'products')->name('products');
            Route::get('/products/{product}/edit', 'edit')->name('products.edit');
            Route::delete('/products/{product}', 'destroy')->name('products.destroy');
            Route::get('/orders', 'orders')->name('orders');
});


require __DIR__.'/auth.php';
