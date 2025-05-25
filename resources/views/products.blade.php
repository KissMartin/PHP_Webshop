@extends('layouts.layout')

@section('content')
<section class="min-h-screen bg-gray-900 py-20 pt-24 text-white">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold mb-10 text-center">Browse All Products</h1>

        @if ($products->isEmpty())
            <p class="text-center text-lg text-gray-400">No products available right now.</p>
        @else
            <div class="w-full min-h-screen flex gap-8">
                <div class="w-1/5 m-4 rounded-2xl bg-gray-800 px-10 py-5">
                    <h1 class="text-left text-4xl mb-2">Filters</h1>
                    <hr>
                    <ul class="text-lg space-y-1.5 mt-2">
                        <li>
                            <input type="checkbox" name="Gaming" id="Gaming"></input>
                            <label for="Gaming">Gaming</label>
                        </li>
                        <li>
                            <input type="checkbox" name="Natural" id="Natural"></input>
                            <label for="Natural">Natural</label>
                        </li>
                        <li>
                            <input type="checkbox" name="Decoration" id="Decoration"></input>
                            <label for="Decoration">Decoration</label>
                        </li>
                        <li>
                            <input type="checkbox" name="Body Care" id="Body Care"></input>
                            <label for="Body Care">Body Care</label>
                        </li>
                        <li>
                            <input type="checkbox" name="Clothes" id="Clothes"></input>
                            <label for="Clothes">Clothes</label>
                        </li>
                    </ul>
                </div>
                <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 m-4">
                    @foreach ($products as $product)
                        <a href="{{ route('product.show', $product->id) }}" class="block">
                            <x-product-card 
                                :name="$product->name"
                                :description="$product->description"
                                :price="$product->price"
                                :image="$product->image_url"
                            />
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>



@endsection