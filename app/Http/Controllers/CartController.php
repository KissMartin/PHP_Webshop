<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->id();
        $cartItems = session()->get("cart_user_{$userId}", []);

        $total = 0;

        if (!empty($cartItems)) {
            foreach ($cartItems as $item) {
                $total += $item['price'] * $item['quantity'];
            }
        }

        return view('cart', compact('cartItems', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Product $product)
    {
        if (!auth()->check()) {
            session()->flash('auth_required', true);
            return redirect()->back();
        }

        $userId = auth()->id();

        $cart = session()->get("cart_user_{$userId}", []);

        $cart[$product->id] = [
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => isset($cart[$product->id]) ? $cart[$product->id]['quantity'] + 1 : 1,
        ];

        session()->put("cart_user_{$userId}", $cart);

        session()->flash('cart_message', [
            'text' => 'Product added to cart!',
            'show_options' => true,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
