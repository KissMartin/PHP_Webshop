@extends('layouts.layout')

@section('content')
<section class="min-h-screen bg-gray-900 py-20 pt-24 text-white">
    <div class="container mx-auto px-4 max-w-6xl">
        <h1 class="text-4xl font-bold mb-12 text-center">Checkout</h1>

        @if (empty($cartItems))
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-center text-lg text-gray-400">
                Your cart is empty.
            </div>
        @else
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg flex flex-col h-[600px]">
                <h2 class="text-2xl font-semibold mb-4 border-b border-gray-700 pb-2">Order Summary</h2>

                <div class="overflow-y-auto grow divide-y divide-gray-700">
                    @foreach ($cartItems as $item)
                        <div class="py-4 flex justify-between items-center">
                            <div>
                                <p class="font-semibold text-lg">{{ $item['name'] }}</p>
                                <p class="text-sm text-gray-400">{{ $item['quantity'] }} × ${{ number_format($item['price'], 2) }}</p>
                            </div>
                            <p class="text-lg font-medium">${{ number_format($item['quantity'] * $item['price'], 2) }}</p>
                        </div>
                    @endforeach
                </div>

                <div class="text-xl font-bold flex justify-between border-t border-gray-700 pt-4 mt-4">
                    <span>Total:</span>
                    <span>${{ number_format($total, 2) }}</span>
                </div>
            </div>

            <form action="{{ route('cart.create') }}" method="POST" class="bg-gray-800 p-6 rounded-lg shadow-lg">
                @csrf

                <h2 class="text-2xl font-semibold mb-4 border-b border-gray-700 pb-2">Billing Details</h2>

                <div class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium mb-1">Full Name</label>
                        <input type="text" id="name" name="name"
                            value="{{ old('name', auth()->user()?->name) }}"
                            class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium mb-1">Email</label>
                        <input type="email" id="email" name="email"
                            value="{{ old('email', auth()->user()?->email) }}"
                            class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>
                    </div>

                    <div>
                        <label for="address" class="block text-sm font-medium mb-1">Shipping Address</label>
                        <textarea id="address" name="address" rows="3"
                            class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>{{ old('address', auth()->user()?->address ?? '') }}</textarea>
                    </div>
                </div>

                <h2 class="text-2xl font-semibold mt-8 mb-4 border-b border-gray-700 pb-2">Payment Info</h2>

                <div class="space-y-4">
                    <div>
                        <label for="card_name" class="block text-sm font-medium mb-1">Cardholder Name</label>
                        <input type="text" id="card_name" name="card_name"
                            class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>
                    </div>

                    <div>
                        <label for="card_number" class="block text-sm font-medium mb-1">Card Number</label>
                        <input type="text" id="card_number" name="card_number"
                            class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>
                    </div>

                    <div class="flex space-x-4">
                        <div class="w-1/2">
                            <label for="expiry" class="block text-sm font-medium mb-1">Expiry Date</label>
                            <input type="text" id="expiry" name="expiry" placeholder="MM/YY"
                                class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>
                        </div>
                        <div class="w-1/2">
                            <label for="cvv" class="block text-sm font-medium mb-1">CVV</label>
                            <input type="text" id="cvv" name="cvv"
                                class="w-full px-4 py-2 rounded bg-gray-700 text-white" required>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full py-3 mt-6 bg-orange-500 hover:bg-orange-600 rounded text-white font-semibold transition">
                        Place Order
                    </button>
                </div>
            </form>
        </div>
        @endif
    </div>
</section>
@endsection
