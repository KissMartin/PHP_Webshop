@extends('layouts.layout')

@section('content')
<section class="min-h-screen bg-gray-900 py-12 text-white">
    <div class="container mx-auto px-4 max-w-3xl">
        <h1 class="text-3xl font-bold mb-8 text-center">Checkout</h1>
        @if (empty($cartItems))
            <p class="text-center text-lg text-gray-400">Your cart is empty.</p>
        @else
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg mb-8">
                <h2 class="text-xl font-semibold mb-4">Order Summary</h2>
                <ul class="divide-y divide-gray-700">
                    @foreach ($cartItems as $item)
                        <li class="py-3 flex justify-between items-center">
                            <div>
                                <p class="font-semibold">{{ $item['name'] }}</p>
                                <p class="text-sm text-gray-400">{{ $item['quantity'] }} × ${{ number_format($item['price'], 2) }}</p>
                            </div>
                            <p class="font-medium">${{ number_format($item['quantity'] * $item['price'], 2) }}</p>
                        </li>
                    @endforeach
                </ul>
                <div class="mt-4 flex justify-between font-bold text-lg">
                    <span>Total:</span>
                    <span>${{ number_format($total, 2) }}</span>
                </div>
            </div>

            <form action="{{ route('cart.create') }}" method="POST" class="bg-gray-800 p-6 rounded-lg shadow-lg">
                @csrf
                <h2 class="text-xl font-semibold mb-4">Billing Details</h2>

                <div class="mb-4">
                    <label for="name" class="block mb-1">Full Name</label>
                    <input type="text" id="name" name="name" class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block mb-1">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>
                </div>

                <div class="mb-4">
                    <label for="address" class="block mb-1">Shipping Address</label>
                    <textarea id="address" name="address" class="w-full px-4 py-2 rounded bg-gray-700 text-white" required></textarea>
                </div>

                <button type="submit" class="w-full py-3 mt-4 bg-blue-600 hover:bg-blue-700 rounded text-white font-semibold transition">
                    Place Order
                </button>
            </form>
        @endif
    </div>
</section>

@endsection