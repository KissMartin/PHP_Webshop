<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/cart', 'cart')->name('cart');
});

Route::controller(ProductController::class)->prefix('products')->group(function () {
    Route::get('/', 'index')->name('products');
    Route::get('/{product}', 'show')->name('product.show');
});

Route::controller(CartController::class)->prefix('cart')->group(function () {
    Route::get('/', 'index')->name('cart');
    Route::post('/add/{product}', 'store')->name('cart.store');
    Route::delete('/remove/{product}', 'destroy')->name('cart.destroy');
});

// Route::get('/products', [WebsiteController::class, 'products'])->name('products');

Route::middleware(['auth', 'verified'])->get('/home', [HomeController::class, 'index']);

// TODO: Profile related stuff
// Route::middleware(['auth', 'verified'])->group(function () {
//         Route::get('/users', [UserController::class, 'index'])->name('users');
//         Route::get('/products', [ProductController::class, 'index'])->name('products');
// });

Route::middleware('auth')
    ->prefix('profile')
    ->name('profile.')
    ->controller(ProfileController::class)
    ->group(
        function () {
            Route::get('/', 'edit')->name('edit');
            Route::patch('/', 'update')->name('update');
            Route::delete('/', 'destroy')->name('destroy');
            Route::get('/orders', 'orders')->name('orders');
            Route::get('/favorites', 'favorites')->name('favorites');
            Route::get('/products', 'products')->name('products');
});

// Todo: Admin related stuff
// Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
//     Route::get('users', [AdminController::class, 'users'])->name('admin.users');
//     Route::get('orders', [AdminController::class, 'orders'])->name('admin.orders');
// });


require __DIR__.'/auth.php';
