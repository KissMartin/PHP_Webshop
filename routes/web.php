<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = [
        (object)[ 'name' => 'Product A', 'description' => 'Nice item', 'price' => 19.99, 'image_url' => null ],
        (object)[ 'name' => 'Product B', 'description' => 'Better item', 'price' => 29.99, 'image_url' => null ],
        (object)[ 'name' => 'Product C', 'description' => 'Best item', 'price' => 39.99, 'image_url' => null ],
    ];
    return view('home', compact('products'));
});

Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['auth', 'verified'])
    ->prefix('dashboard')
    ->name('dashboard.')
    ->middleware(['admin'])
    ->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users');
        Route::get('/products', [ProductController::class, 'index'])->name('products');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
