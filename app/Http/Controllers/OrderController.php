<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $activeOrders = Order::with('orderItems.product')
            ->where('user_id', $user->id)
            ->whereIn('status', ['pending', 'paid'])
            ->latest()
            ->get();


        $pastOrders = Order::with('orderItems.product')
            ->where('user_id', $user->id)
            ->whereIn('status', ['shipped', 'cancelled'])
            ->latest()
            ->get();

        return view('profile.orders', compact('activeOrders', 'pastOrders'));
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
    public function store(Request $request)
    {
        //
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
    public function updateStatus(Request $request, Order $order)
    {
        if ($order->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        $validated = $request->validate([
            'status' => 'required|in:pending,paid,shipped,cancelled',
        ]);

        $order->status = $validated['status'];
        $order->save();

        return redirect()->back()->with('success', 'Order status updated.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function cancel(Order $order)
    {
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        if (!in_array($order->status, ['pending', 'paid'])) {
            return back()->withErrors(['order' => 'You cannot cancel this order at this stage.']);
        }

        $order->status = 'cancelled';
        $order->save();

        return back()->with('success', 'Order cancelled successfully.');
    }

    public function payNow(Order $order)
    {
        if ($order->user_id !== auth()->id() || $order->payment_method !== 'cash' || $order->status !== 'pending') {
            abort(403);
        }

        $order->status = 'paid';
        $order->save();

        return back()->with('success', 'Order paid successfully!');
    }
}
