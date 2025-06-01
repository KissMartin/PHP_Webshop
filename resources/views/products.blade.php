@extends('layouts.layout')

@section('content')

<x-cart-notification />

<x-auth-required-popup />

<section class="min-h-screen bg-gray-900 py-20 pt-24 text-white">
    <div class="container mx-auto px-4">
        <div class="mb-8">
            <h1 class="text-4xl text-center">Browse All Products</h1>
        <x-small-search-bar 
                :route="route('products')" 
                placeholder="Search products..." 
                name="search"
                :value="request('search')"
                class="mt-8"
            />
            @if ($search)
                <h2 class="text-2xl text-center text-gray-500">Results for "{{ $search }}"</h2>
            @endif
        </div>


        @if ($products->isEmpty())
            <p class="text-center text-lg text-gray-400">No products available right now.</p>
        @else
            <div class="w-full min-h-screen flex gap-8">
                <x-defaults.backdrop class="w-1/5 max-h-fit m-4 px-10">
                    <h1 class="text-4xl">Filter</h1>
                    <hr class="my-2">
                    <form method="GET" action="{{ route('products.filter') }}">
                        <ul class="text-lg space-y-1.5">
                            @foreach ($categories as $category)
                                <li class="filter-category flex justify-center flex-col">
                                    <x-defaults.checkbox 
                                        name="categories[]"
                                        id="category-{{ $category->id }}"
                                        value="{{ $category->id }}"
                                        :checked="request('categories') && in_array($category->id, request('categories'))"
                                    />
                                    <x-input-label 
                                        class="inline-block"
                                        for="category-{{ $category->id }}"
                                        :value="$category->name"
                                    />
                                </li>
                            @endforeach
                        </ul>
                        <div class="flex justify-between items-center italic text-sm my-2 text-gray-400">
                            <div id="more-filters-btn" class="text-left cursor-pointer">Show more</div>
                            <div id="less-filters-btn" class="text-right cursor-pointer">Show less</div>
                        </div>
                        <hr class="my-2">
                        <input type="hidden" name="search" value="{{ request('search') }}">
                        <x-defaults.primary-button-rounded class="block w-full">
                            <i class="fa fa-filter mr-2"></i> Filter
                        </x-defaults.primary-button-rounded>
                    </form>
                </x-defaults.backdrop>
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