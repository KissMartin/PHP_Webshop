@extends('layouts.layout')

@section('content')
@if (session('cart_message'))
    <div id="cart-notification" class="fixed bottom-4 right-4 bg-gray-800 text-white p-6 rounded-lg shadow-lg w-80 z-50">
        <p class="font-semibold mb-4">✅ {{ session('cart_message')['text'] }}</p>
        @if (session('cart_message')['show_options'])
            <div class="flex justify-end space-x-4">
                <button 
                    onclick="document.getElementById('cart-notification').style.display = 'none';" 
                    class="text-gray-300 hover:text-white focus:outline-none"
                >
                    Continue Browsing
                </button>
                <a href="{{ route('cart') }}" class="bg-blue-600 px-4 py-2 rounded hover:bg-blue-700 text-white text-sm">
                    View Cart
                </a>
            </div>
        @endif
    </div>
@endif

@if(session('auth_required'))
    @php
        $currentUrl = url()->current();
    @endphp

    <div id="auth-popup" class="fixed bottom-4 right-4 bg-red-700 text-white p-6 rounded-lg shadow-lg w-80 z-50">
        <p class="font-semibold mb-4">
            ⚠️ You need to 
            <a href="{{ route('login', ['redirect' => $currentUrl]) }}" class="underline">login</a> or 
            <a href="{{ route('register', ['redirect' => $currentUrl]) }}" class="underline">register</a> to purchase.
        </p>
        <button onclick="document.getElementById('auth-popup').style.display='none';" class="text-white underline">
            Close
        </button>
    </div>
@endif

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
    <h1 class="text-3xl font-bold mb-6">{{ $product->name }}</h1>

    <div class="flex flex-col md:flex-row md:space-x-8">
        <div class="md:w-1/2 mb-6 md:mb-0">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-auto rounded-lg shadow-md object-cover">
        </div>

        <div class="md:w-1/2 flex flex-col justify-start">
            <h2 class="text-2xl font-semibold mb-4">Price: ${{ number_format($product->price, 2) }}</h2>
            <p class="mb-6 text-gray-300">{{ $product->description }}</p>

            <form action="{{ route('cart.store', $product->id) }}" method="POST" class="w-full max-w-xs">
                @csrf
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-md transition duration-200">
                    Add to Cart
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
