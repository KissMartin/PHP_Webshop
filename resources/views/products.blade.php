@extends('layouts.layout')

@section('content')
<section class="min-h-screen bg-gray-900 py-12 text-white">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold mb-10 text-center">Browse All Products</h1>

        @if ($products->isEmpty())
            <p class="text-center text-lg text-gray-400">No products available right now.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($products as $product)
                    <a href="{{ route('product.show', $product->id) }}" class="block hover:opacity-90 transition">
                        <x-product-card 
                            :name="$product->name"
                            :description="$product->description"
                            :price="$product->price"
                            :image="$product->image_url"
                        />
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</section>



@endsection