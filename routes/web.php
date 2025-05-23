<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\ProductController;

Route::get('/', function () {
    $praiseCards = [
        (object)[ 'title' => 'Vast Global Marketplace', 'content' => 'Discover millions of products and reliable suppliers worldwide to meet your business needs.' ],
        (object)[ 'title' => 'Secure Quality Assurance', 'content' => 'Source confidently from verified suppliers, with transaction safeguards covering payment, shipping, and delivery.' ],
        (object)[ 'title' => 'Streamlined End-to-End Solutions', 'content' => 'Simplify your workflow with integrated tools for sourcing, order management, payments, and logistics—all in one platform.' ],
        (object)[ 'title' => 'Customized Growth Support', 'content' => 'Unlock tailored advantages like priority discounts, dedicated assistance, and enhanced safeguards to accelerate your business growth.' ],
    ];

    return view('home', compact('praiseCards'));
})->name('home');

Route::middleware(['auth', 'verified'])->get('/home', function () {
    $praiseCards = [
        (object)[ 'title' => 'Vast Global Marketplace', 'content' => 'Discover millions of products and reliable suppliers worldwide to meet your business needs.' ],
        (object)[ 'title' => 'Secure Quality Assurance', 'content' => 'Source confidently from verified suppliers, with transaction safeguards covering payment, shipping, and delivery.' ],
        (object)[ 'title' => 'Streamlined End-to-End Solutions', 'content' => 'Simplify your workflow with integrated tools for sourcing, order management, payments, and logistics—all in one platform.' ],
        (object)[ 'title' => 'Customized Growth Support', 'content' => 'Unlock tailored advantages like priority discounts, dedicated assistance, and enhanced safeguards to accelerate your business growth.' ],
    ];

    return view('home', compact('praiseCards'));
});

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
