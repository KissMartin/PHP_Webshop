@extends('layouts.layout')

@section('content')

<x-cart-notification />

<x-auth-required-popup />

<section class="min-h-screen bg-gray-900 py-20 pt-24 text-white">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold mb-10 text-center">Browse All Products</h1>
        @if ($search)
            <h2 class="text-2xl mb-4">Results for "{{ $search }}"</h2>
        @endif


        @if ($products->isEmpty())
            <p class="text-center text-lg text-gray-400">No products available right now.</p>
        @else
            <div class="w-full min-h-screen flex gap-8">
                <div class="w-1/5 m-4 rounded-2xl bg-gray-800 px-10 py-5 max-h-fit">
                    <h1 class="text-left text-4xl">Filters</h1>
                    <hr class="my-2">
                    <form method="GET" action="{{ route('products.filter') }}">
                        <ul class="text-lg space-y-1.5">
                            @foreach ($categories as $category)
                                <li>
                                    <input type="checkbox" name="categories[]" id="category-{{ $category->id }}" value="{{ $category->id }}" @if(request('categories') && in_array($category->id, request('categories'))) checked @endif>
                                    <label for="category-{{ $category->id }}">{{ $category->name }}</label>
                                </li>
                            @endforeach
                        </ul>
                        <hr class="my-2">
                        <input type="hidden" name="search" value="{{ request('search') }}">
                        <button type="submit" class="block w-full rounded-3xl h-[2.5rem] bg-orange-700 text-xl cursor-pointer hover:bg-orange-600">Filter</button>
                    </form>
                </div>
                <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 m-4">
                    @foreach ($products as $product)
                        <a href="{{ route('product.show', $product->id) }}" class="block">
                            <x-product-card 
                                :name="$product->name"
                                :description="$product->description"
                                :price="$product->price"
                                :image="$product->image_url"
                                :buttonRoute="route('cart.store', $product->id)"
                            />
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>



@endsection