@extends('layouts.layout')

@section('content')

<x-cart-notification />

<x-auth-required-popup />

<div class="w-7xl h-screen mx-auto flex items-center p-4">
    <div class="w-full h-4/5 grid grid-cols-2 space-y-2">
        <div class="">
            <h1 class="text-3xl font-bold mb-2 h-1/12">{{ $product->name }}</h1>
            <h1 class="text-md mb-2 text-gray-500 h-1/12">Uploaded by: {{ $product->author->name ?? 'Unknown' }}</h1>
            <div class="w-full pr-10 h-10/12">
                <img src="{{ $product->image_url ?? 'https://placehold.co/300'}}" alt="{{ $product->name }}" class="w-full h-auto rounded-lg shadow-md object-cover">
            </div>
        </div>
        <div class="rounded-2xl bg-gray-800 px-10 py-5">
            <div class="flex justify-center items-center gap-10 h-2/12 p-2"> <!-- Price and stock -->
                <div class="flex flex-col"> 
                    <p class="text-lg text-center text-gray-400">Price</p>
                    <p class="text-center text-2xl">{{$product->price }} $</p>
                </div>
                <div class="flex flex-col">
                    <p class="text-lg text-center text-gray-400">Avaliable Stock</p>
                    <p class="text-center text-2xl">{{$product->stock}} pcs</p>
                </div>
            </div>
            <hr>
            <div class="h-8/12 p-2"> <!-- Description -->
                <p class="text-lg text-gray-400 mb-2">Description</p>
                <p class="text-gray-300 text-xl">{{ $product->description }} lorem*10</p>
            </div>
            <hr>
            <div class="w-full h-2/12 flex items-center justify-center"> <!-- Add to Cart Form -->
                <form action="{{ route('cart.store', $product->id) }}" method="POST" class="w-full max-w-xs p-2 mx-auto">
                    @csrf
                    <x-primary-button class="w-full">
                        {{__("Add to Cart")}}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
    <h1 class="text-3xl font-bold mb-6">{{ $product->name }}</h1>

    <div class="flex flex-col md:flex-row md:space-x-8">
        <div class="md:w-1/2 mb-6 md:mb-0">
            <img src="{{ $product->image_url ?? 'https://placehold.co/300'}}" alt="{{ $product->name }}" class="w-full h-auto rounded-lg shadow-md object-cover">
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
</div> --}}
@endsection
