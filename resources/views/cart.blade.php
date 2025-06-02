@extends('layouts.layout')

@section('content')

<x-cart-error-popup :message="session('cart_error')" />

<section class="min-h-screen bg-gray-900 py-20 pt-24 text-white">
    <div class="container mx-auto px-4 max-w-6xl">
        <h1 class="text-4xl font-bold mb-12 text-center">Checkout</h1>

        @if (empty($cartItems))
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-center text-lg text-gray-400">
                Your cart is empty.
            </div>
            @else
            <div class="flex gap-8">
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg flex flex-col min-h-[600px]">
                    <h2 class="text-2xl font-semibold mb-4 border-b border-gray-700 pb-2">Order Summary</h2>

                    <div class="overflow-y-auto grow divide-y divide-gray-700">
                        @foreach ($cartItems as $productId => $item)
                            <div class="py-4 flex justify-between items-center">
                                <div>
                                    <p class="font-semibold text-lg">{{ $item['name'] }}</p>
                                    <p class="text-sm text-gray-400 w-72">
                                        {{ $item['quantity'] }} 
                                        x
                                        <x-pricetag :price="$item['price']" />
                                    </p>
                                </div>
                                <div class="flex items-center gap-4">
                                    <x-pricetag class="text-lg font-medium" :price="$item['quantity'] * $item['price']" />
                                    <form action="{{ route('cart.destroy', $productId) }}" method="POST" onsubmit="return confirm('Remove this item from cart?');" class="flex items-center gap-2">
                                        @csrf
                                        @method('DELETE')
                                        <input
                                            type="number"
                                            name="quantity"
                                            min="1"
                                            max="{{ $item['quantity'] }}"
                                            value="1"
                                            class="w-16 px-2 py-1 rounded bg-gray-700 text-white border border-gray-600 focus:outline-none"
                                        >
                                        <x-danger-button class="px-3 py-1">
                                            <i class="fa fa-trash"></i>
                                        </x-danger-button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-xl font-bold flex justify-between border-t border-gray-700 pt-4 mt-4">
                        <span>Total:</span>
                        <x-pricetag :price='$total' />
                    </div>
                </div>

                <form action="{{ route('cart.create') }}" method="POST" class="bg-gray-800 p-6 rounded-lg shadow-lg"
                    x-data="{ payment: 'card' }">
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

                    {{-- TODO: Styling --}}
                    <div class="space-y-4">
                        <div class="flex space-x-4">
                            <x-input-label :value="__('Payment Method:')" />
                            {{-- <label class="block text-sm font-medium mb-2">Payment Method</label> --}}
                            <div class="flex gap-6">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="payment_method" value="card" x-model="payment" checked>
                                    <span>Card</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="payment_method" value="cash" x-model="payment">
                                    <span>Pay later with Cash</span>
                                </label>
                            </div>
                        </div>

                        <div x-show="payment === 'card'" x-cloak class="space-y-4">
                            <div>
                                <x-input-label for="card_name" :value="__('Cardholder Name')" />
                                <x-text-input id="card_name" name="card_name" class="w-full" x-bind:required="payment === 'card'" />
                            </div>

                            <div>
                                <x-input-label for="card_number" :value="__('Card Number')" />
                                <x-text-input id="card_number" name="card_number"
                                    class="w-full" x-bind:required="payment === 'card'" />
                            </div>

                            <div class="flex space-x-4">
                                <div class="w-1/2">
                                    <x-input-label for="expiry" :value="__('Expiry Date')" />
                                    <x-text-input id="expiry" name="expiry" placeholder="MM/YY"
                                        class="w-full" x-bind:required="payment === 'card'" />
                                </div>
                                <div class="w-1/2">
                                    <x-input-label for="cvv" :value="__('CVV')" />
                                    <x-text-input id="cvv" name="cvv"
                                        class="w-full" x-bind:required="payment === 'card'" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <x-primary-button class="w-full mt-6 font-semibold">
                        Place Order
                    </x-primary-button>
                </form>
            </div>
        @endif
    </div>
</section>
@endsection