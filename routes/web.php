<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

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
            Route::get('/', 'profile')->name('profile');
            Route::get('/edit', 'edit')->name('edit');
            Route::patch('/', 'update')->name('update')->middleware('throttle:5,1');
            Route::delete('/', 'destroy')->name('destroy')->middleware('throttle:3,1');
            Route::get('/orders', 'orders')->name('orders');
            Route::get('/favorites', 'favorites')->name('favorites');
            Route::get('/products', 'products')->name('products');
});

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->controller(AdminUserController::class)
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/users', 'users')->name('users');
    Route::get('/products', 'products')->name('products');
    Route::get('/orders', 'orders')->name('orders');
    Route::get('/products/{product}/edit', 'edit')->name('products.edit');
    Route::delete('/products/{product}', 'destroy')->name('products.destroy');

});


require __DIR__.'/auth.php';
