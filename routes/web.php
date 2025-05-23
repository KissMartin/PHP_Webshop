<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\ProductController;

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])->get('/home', [HomeController::class, 'index']);

Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users');
        Route::get('/products', [ProductController::class, 'index'])->name('products');
});

Route::middleware('auth')
    ->prefix('profile')
    ->name('profile.')
    ->controller(ProfileController::class)
    ->group(function () {
        Route::get('/', 'edit')->name('edit');
        Route::patch('/', 'update')->name('update');
        Route::delete('/', 'destroy')->name('destroy');
        Route::get('/orders', 'orders')->name('orders');
        Route::get('/favorites', 'favorites')->name('favorites');
        Route::get('/products', 'products')->name('products');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('orders', [AdminController::class, 'orders'])->name('admin.orders');
});


require __DIR__.'/auth.php';
