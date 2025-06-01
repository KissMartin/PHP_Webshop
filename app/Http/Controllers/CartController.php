<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
    public function createOrder(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login to place an order.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:1000',
            'payment_method' => 'required|in:card,cash',
        ]);

        $userId = auth()->id();
        $cartItems = session("cart_user_{$userId}");

        if (empty($cartItems)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item['quantity'] * $item['price'];
        }

        $paymentSuccessful = $this->authenticatePayment($request, $totalPrice);

        if (!$paymentSuccessful) {
            return redirect()->back()->with('error', 'Payment failed. Please try again.');
        }

        DB::beginTransaction();

        try {
            Log::info('Creating order with user ID: ' . $user->id . ', total: ' . $totalPrice);
            $order = Order::create([
                'user_id' => $user->id,
                'status' => 'pending',
                'total_price' => $totalPrice,
                'payment_method' => $validated['payment_method'],
            ]);
            Log::info('Order created successfully', ['order_id' => $order->id]);

            foreach ($cartItems as $productId => $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $item['quantity'],
                    'price_at_purchase' => $item['price'],
                ]);

                $product = Product::find($productId);
                if ($product) {
                    $product->stock = max(0, $product->stock - $item['quantity']);
                    $product->save();
                }
            }

            DB::commit();

            session()->forget("cart_user_{$userId}");

            return redirect()->route('profile.orders')->with('success', 'Order placed successfully!');

        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Order placement failed: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Failed to place order. Please try again.');
        }
    }

    protected function authenticatePayment(Request $request, float $amount): bool
    {
        return true;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product)
    {
        if (!auth()->check()) {
            session()->flash('auth_required', true);
            return redirect()->back();
        }

        $userId = auth()->id();
        $cart = session()->get("cart_user_{$userId}", []);

        $requestedQty = isset($request) && $request->has('quantity') ? max(1, (int) $request->input('quantity')) : 1;
        $currentQty = isset($cart[$product->id]) ? $cart[$product->id]['quantity'] : 0;

        if (($currentQty + $requestedQty) > $product->stock) {
            session()->flash('cart_error', 'Cannot add more than available stock!');
            return redirect()->back();
        }

        $cart[$product->id] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $currentQty + $requestedQty,
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
    public function destroy(Request $request, $productId)
    {
        $userId = auth()->id();
        $cart = session()->get("cart_user_{$userId}", []);
        $qtyToRemove = max(1, (int) $request->input('quantity', 1));

        if (isset($cart[$productId])) {
            if ($cart[$productId]['quantity'] > $qtyToRemove) {
                $cart[$productId]['quantity'] -= $qtyToRemove;
            } else {
                unset($cart[$productId]);
            }
            session()->put("cart_user_{$userId}", $cart);
        }

        return redirect()->back()->with('success', 'Item(s) removed from cart.');
    }
}
