@extends('layouts.layout')

@section('content')
    <section class="bg-blue-600 text-white text-center py-16">
        <h2 class="text-4xl font-bold mb-4">Welcome to Our Shop</h2>
        <p class="text-lg">Find the best products at unbeatable prices</p>
        <a href="#" class="mt-6 inline-block bg-white text-blue-600 font-semibold px-6 py-2 rounded shadow hover:bg-gray-100">Shop Now</a>
    </section>

    <section class="container mx-auto py-12 px-4">
        <h3 class="text-2xl font-bold mb-6">Featured Products</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($products ?? [] as $product)
                <x-product-card 
                    :name="$product->name"
                    :description="$product->description"
                    :price="$product->price"
                    :image="$product->image_url"
                />
            @endforeach

        </div>
    </section>
@endsection
