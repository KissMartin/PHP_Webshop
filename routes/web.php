<?php

use Illuminate\Support\Facades\Route;

// Route::view('/', 'home');

// Placeholder data for demo
Route::get('/', function () {
    $products = [
        (object)[ 'name' => 'Product A', 'description' => 'Nice item', 'price' => 19.99, 'image_url' => null ],
        (object)[ 'name' => 'Product B', 'description' => 'Better item', 'price' => 29.99, 'image_url' => null ],
        (object)[ 'name' => 'Product C', 'description' => 'Best item', 'price' => 39.99, 'image_url' => null ],
    ];
    return view('home', compact('products'));
});