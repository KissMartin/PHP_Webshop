@extends('layouts.layout')

@section('content')

<x-cart-notification />

<x-auth-required-popup />

<x-cart-error-popup :message="session('cart_error')" />

<div class="w-7xl h-screen mx-auto flex items-center p-4">
    <div class="w-full h-4/5 grid grid-cols-2 space-y-2">
        <div class="">
            <h1 class="text-3xl font-bold mb-2 h-1/12">{{ $product->name }}</h1>
            <h1 class="text-md mb-2 text-gray-500 h-1/12">
                Uploaded by: 
                <x-defaults.link-normal class="text-orange-400 underline" 
                    :href="route('profile.public', $product->author->id)">
                    {{ $product->author->name ?? 'Unknown' }}
                </x-defaults.link-normal>
            </h1>
            <div class="w-full pr-10 h-10/12">
                <img src="{{ $product->image_url ?? 'https://placehold.co/300'}}" alt="{{ $product->name }}" class="w-full h-auto rounded-lg shadow-md object-cover">
            </div>
        </div>
        <x-defaults.backdrop>
            <div class="flex justify-center items-center gap-10 h-2/12 p-2"> <!-- Price and stock -->
                <div class="flex flex-col"> 
                    <p class="text-lg text-center text-gray-400">Price</p>
                    <x-pricetag :price="$product->price" class="text-2xl text-center"></x-pricetag>
                    {{-- <p class="text-center text-2xl">{{$product->price }} $</p> --}}
                </div>
                <div class="flex flex-col">
                    <p class="text-lg text-center text-gray-400">Avaliable Stock</p>
                    <p class="text-center text-2xl">{{$product->stock}} pcs</p>
                </div>
            </div>
            <hr>
            <div class="h-8/12 p-2"> <!-- Description -->
                <p class="text-lg text-gray-400 mb-2">Description</p>
                <p class="text-gray-300 text-xl overflow-y-auto max-h-[26rem]"> {{ $product->description }} </p>
            </div>
            <hr>
            <div class="w-full h-2/12 flex items-center justify-center"> <!-- Add to Cart Form -->
                @if($product->stock > 0)
                    <form action="{{ route('cart.store', $product->id) }}" method="POST" class="w-full max-w-xs p-2 mx-auto flex items-center gap-2">
                        @csrf
                        <input
                            type="number"
                            name="quantity"
                            min="1"
                            max="{{ $product->stock }}"
                            value="1"
                            class="w-20 px-2 py-1 rounded bg-gray-700 text-white border border-gray-600 focus:outline-none"
                        >
                        <x-primary-button class="w-full">
                            <i class="fa fa-2x fa-cart-plus mr-2"></i>
                            Add to Cart
                        </x-primary-button>
                    </form>
                @else
                    <button class="w-full max-w-xs p-2 mx-auto bg-gray-600 text-gray-300 rounded-lg cursor-not-allowed opacity-60" disabled>
                        Out of Stock
                    </button>
                @endif
            </div>
        </x-defaults.backdrop>
    </div>
</div>
@endsection
