@extends('layouts.layout')

@section('content')

<x-cart-notification />

<x-auth-required-popup />


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
                <x-primary-button class="w-full">
                    {{__("Add to Cart")}}
                </x-primary-button>
            </form>
        </div>
    </div>
</div>
@endsection
