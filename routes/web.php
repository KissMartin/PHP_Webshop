<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = [
        (object)[ 'name' => 'Product A', 'description' => 'Nice item', 'price' => 19.99, 'image_url' => null ],
        (object)[ 'name' => 'Product B', 'description' => 'Better item', 'price' => 29.99, 'image_url' => null ],
        (object)[ 'name' => 'Product C', 'description' => 'Best item', 'price' => 39.99, 'image_url' => null ],
    ];
    return view('home', compact('products'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
