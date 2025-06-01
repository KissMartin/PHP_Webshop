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
                                <p class="text-sm text-gray-400 w-96">
                                    {{ $item['quantity'] }} 
                                    x
                                    <x-pricetag :price="$item['price']" />
                                </p>
                            </div>
                            <x-pricetag class="text-lg font-medium" :price="number_format($item['quantity'] * $item['price'], 2)" />
                        </div>
                    @endforeach
                </div>

                <div class="text-xl font-bold flex justify-between border-t border-gray-700 pt-4 mt-4">
                    <span>Total:</span>
                    <x-pricetag :price='$total' />
                </div>
            </div>

            <form action="{{ route('cart.create') }}" method="POST" class="bg-gray-800 p-6 rounded-lg shadow-lg">
                @csrf

                <h2 class="text-2xl font-semibold mb-4 border-b border-gray-700 pb-2">Billing Details</h2>

                <div class="space-y-4">
                    <div>
                        <x-input-label for="name" :value="__('Full Name')" />
                        <x-text-input id="name" name="name"
                            value="{{ old('name', auth()->user()?->name) }}"
                            class="w-full" required />
                    </div>

                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" name="email"
                            value="{{ old('email', auth()->user()?->email) }}"
                            class="w-full" required />
                    </div>

                    <div>
                        <x-input-label for="address" :value="__('Shipping Address')" />
                        <textarea id="address" name="address" rows="3"
                            class="w-full px-4 py-2 rounded-md border border-gray-600 bg-gray-800 text-white" required>{{ old('address', auth()->user()?->address ?? '') }}</textarea>
                    </div>
                </div>

                <h2 class="text-2xl font-semibold mt-8 mb-4 border-b border-gray-700 pb-2">Payment Info</h2>

                <div class="space-y-4">
                    <div>
                        <x-input-label for="card_name" :value="__('Cardholder Name')" />
                        <x-text-input id="card_name" name="card_name"
                            class="w-full" required />
                    </div>

                    <div>
                        <x-input-label for="card_number" :value="__('Card Number')" />
                        <x-text-input id="card_number" name="card_number"
                            class="w-full" required />
                    </div>

                    <div class="flex space-x-4">
                        <div class="w-1/2">
                            <x-input-label for="expiry" :value="__('Expiry Date (MM/YY)')" />
                            <x-text-input id="expiry" name="expiry" placeholder="MM/YY"
                                class="w-full" required />
                        </div>
                        <div class="w-1/2">
                            <x-input-label for="cvv" :value="__('CVV')" />
                            <x-text-input id="cvv" name="cvv"
                                class="w-full" required />
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
